<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\PatientRequest;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index(){
        return view('Patient.home.home');
    }

    public function getDoctor(){
        $result = Doctor::all();
        return view('Patient.doctor.doctor_list',compact('result'));
    }

    public function setRequest(Request $request, $id){
        $p_id = session('patient')->id;
        $d_id = $id;

        $req = new PatientRequest();
        $req->patient_id = $p_id;
        $req->doctor_id = $d_id;
        $req->subject = $request->subject;
        $req->message = $request->message;
        $req->created = Carbon::now();
        $req->updated = Carbon::now();
        $req->save();
        if($req){
            return redirect()->back()->with('Success','Request Submited Successfuly');
        }else{
            return redirect()->back()->with('Ooops','Your internet connection is incorect');
        }
    }

    public function getAppointments(){
        $result = DB::table('doctors')
            ->join('appointments','appointments.doctor_id','=','doctors.id')
            ->select('appointments.id','firstname','lastname','phone','photo','start_time','end_time','number_patient','appointments.trash','appointments.created')
            ->where('appointments.trash', 0)
            ->get();
        return view('Patient.appointment.appointment',compact('result'));
    }

    public function setAppointment($id){
        $app_id = $id;
        $patient_id = session('patient')->id;
        DB::table('app_patient')
            ->insert([
                'appointment_id' => $app_id,
                'patient_id' => $patient_id,
                'created' => Carbon::now(),
                'updated' => Carbon::now()
            ]);
        DB::table('appointments')->where('id',$id)->decrement('number_patient');
        return redirect()->back()->with('Success','You Set an Appointment Successfuly');
    }

    public function getMyAppointment(){
        $patient_id = session('patient')->id;
        $result = DB::table('app_patient')
            ->join('appointments','app_patient.appointment_id','=','appointments.id')
            ->join('doctors','appointments.doctor_id','=','doctors.id')
            ->select('app_patient.id','patient_id','start_time','end_time','appointments.created','phone','photo','firstname','lastname','appointments.trash')
            ->where('appointments.trash', 0)
            ->where('patient_id',$patient_id)
            ->get();
        return view('Patient.appointment.myappointment',compact('result'));
    }

    public function getRequest(){
        $patient_id = session('patient')->id;
        $result = DB::table('doctors')
            ->join('requests','requests.doctor_id','=','doctors.id')
            ->select('requests.id','patient_id','doctor_id','subject','message','response','requests.created','requests.updated','firstname','lastname','photo')
            ->where('patient_id',$patient_id)
            ->get();
        $doctors = Doctor::all();
        return view('Patient.Request.request',compact('result','doctors'));
    }

    public function storeRequest(Request $request){
        $patient_id = session('patient')->id;
        $req = new PatientRequest();
        $req->patient_id= $patient_id;
        $req->doctor_id = $request->doctor;
        $req->subject = $request->subject;
        $req->message = $request->message;
        $req->created = Carbon::now();
        $req->updated = Carbon::now();

        $req->save();
        if($req){
            return redirect()->back()->with('Success','Request Submited Successfuly');
        }else{
            return redirect()->back()->with('Success','Your Internet Connection is Incorect');
        }
    }

    public function updateRequest(Request $request,$id){
        $req = PatientRequest::find($id);
        $req->doctor_id = $request->doctor;
        $req->subject = $request->subject;
        $req->message = $request->message;
        $req->updated = Carbon::now();
        $req->save();
        if($req){
            return redirect()->back()->with('Success','Request Updated Successfuly');
        }else{
            return redirect()->back()->with('Success','Your Internet Connection is Incorect');
        }
    }

    public function destroyRequest($id){
        $req = PatientRequest::where('id',$id)->delete();
        if($req){
            return redirect()->back()->with('Success','Request Deleted Successfuly');
        }else{
            return redirect()->back()->with('Success','Your Internet Connection is Incorect');
        }
    }

    public function patientProfile(){
            $id = session('patient')->id;
            $patient = Patient::where('id',$id)->first();
        return view('Patient.p_account.profile',compact('patient'));
    }

    public function updatePaAccount(Request $request, $id){

        $patient = Patient::where('id',$id)->first();
        if(!Hash::check($request->current_password, $patient->password)){
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
            $photo_address = $patient->photo;
        }
        $password="";
        if($request->password == ""){
            $password = $patient->password;
        }else{
            $password = Hash::make($request->password);
        }

        $patient = Patient::find($id);
        $id = session('doctor')->id;
        $patient->firstname = $request->firstname;
        $patient->lastname = $request->lastname;
        $patient->username = $request->username;
        $patient->password = $password;
        $patient->photo = $photo_address;
        $patient->email = $request->email;
        $patient->degree = $request->degree;
        $patient->phone = $request->phone;
        $patient->save();
        if($patient){
            $patient = Patient::where('id',$id)->first();
            session()->put('patient',$patient);
            return redirect()->back()->with('Success','Doctor profile Updated Successfuly');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }

    public function patientLogout(){
        session()->flush();
        return redirect()->route('show.user.login');
    }
}
