<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DoctorController extends Controller
{
    //
    public function index(){
        return view('Doctor.Home.home');
    }


    public function getAppointment(){
        $id = session('doctor')->id;
        $result = Appointment::where('doctor_id',$id)->where('trash',0)->OrderBy('created','desc')->get();
        return view('Doctor.appointment.appointment', compact('result'));
    }

    public function storeAppointment(Request $request){
        $id = session('doctor')->id;
        $app = new Appointment();
        $app->doctor_id = $id;
        $app->start_time = $request->start_time;
        $app->end_time = $request->end_time;
        $app->number_patient = $request->no_patient;
        $app->created = Carbon::now();
        $app->updated = Carbon::now();
        $app->save();
        if($app){
            return redirect()->back()->with('success','Appointment Created Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }

    public function updateAppointment(Request $request ,$id){
        $app = Appointment::find($id);
        $app->start_time = $request->start_time;
        $app->end_time = $request->end_time;
        $app->number_patient = $request->no_patient;
        $app->created = Carbon::now();
        $app->updated = Carbon::now();
        $app->save();
        if($app){
            return redirect()->back()->with('success','Appointment Updated Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }

    public function destroyAppointment($id){
        $app = Appointment::where('id',$id)->update(['trash' => 1]);
        if($app){
            return redirect()->back()->with('success','Appointment Deleted Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }

    public function getRequests(){
        $id = session('doctor')->id;
        $result = DB::table('requests')
            ->join('patients','patients.id','=','requests.patient_id')
            ->select('firstname','lastname','phone','requests.id','subject','message','response','requests.created','requests.updated')
            ->where('doctor_id', $id)
            ->get();
            return view('Doctor.Request.request',compact('result'));
    }

    public function storeResponse(Request $request, $id){
        $result = DB::table('requests')
            ->where('id',$id)
            ->update([
                'response' => $request->response,
                'updated' => Carbon::now(),
            ]);
        if($result){
            return redirect()->back()->with('success','Request Added Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }



    public function appointmentPatient($id){
        $result = DB::table('appointments')
            ->join('app_patient','appointments.id','=', 'app_patient.appointment_id')
            ->join('patients','patient_id','=','patients.id')
            ->where('appointments.id',$id)
            ->select('appointments.id','firstname', 'lastname', 'dob', 'phone', 'verify', 'account_status', 'warning','app_patient.created','app_patient.updated')
            ->get();
        return view('Doctor.appointment.appointment_patient',compact('result'));
    }
    public function doctorProfile(){
            $id = session('doctor')->id;
            $doctor = Doctor::where('id',$id)->first();
        return view('Doctor.Home.profile',compact('doctor'));
    }

    public function updateDocAccount(Request $request ,$id){

        $doctor = Doctor::where('id',$id)->first();
        if(!Hash::check($request->current_password, $doctor->password)){
            return redirect()->back()->with('Error','Current Password is Incorect');
        }
        if($request->password != $request->confirm_password){
            return redirect()->back()->with('Error','Password and Confirm_password Mismatch');
        }
        $photo_address="uploads/favican.jpg";
        if($request->file('photo')){
            $file = $request->file('photo');
            $name = 'uploads/users/'.time().$file->getClientOriginalName();
            $file->move('uploads/users/',$name);
            $photo_address = $name;
        }else{
            $photo_address = $doctor->photo;
        }
        $password="";
        if($request->password == ""){
            $password = $doctor->password;
        }else{
            $password = Hash::make($request->password);
        }

        $doctor = Doctor::find($id);
        $id = session('doctor')->id;
        $doctor->firstname = $request->firstname;
        $doctor->lastname = $request->lastname;
        $doctor->username = $request->username;
        $doctor->password = $password;
        $doctor->photo = $photo_address;
        $doctor->email = $request->email;
        $doctor->degree = $request->degree;
        $doctor->phone = $request->phone;
        $doctor->save();
        if($doctor){
            $doctor = Doctor::where('id',$id)->first();
            session()->put('doctor',$doctor);
            return redirect()->back()->with('Success','Doctor profile Updated Successfuly');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }


    public function DocLogout(){
        session()->flush();
        return redirect()->route('show.user.login');
    }
}
