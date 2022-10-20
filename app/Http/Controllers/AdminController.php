<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\models\Patient;
use App\models\Doctor;
use App\models\User;
use App\models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $jan = DB::select("SELECT COUNT(*) as jan FROM patients WHERE MONTH(created) = 1");
        $feb = DB::select("SELECT COUNT(*) as feb FROM patients WHERE MONTH(created) = 2");
        $mar = DB::select("SELECT COUNT(*) as mar FROM patients WHERE MONTH(created) = 3");
        $apr = DB::select("SELECT COUNT(*) as apr FROM patients WHERE MONTH(created) = 4");
        $may = DB::select("SELECT COUNT(*) as may FROM patients WHERE MONTH(created) = 5");
        $jun = DB::select("SELECT COUNT(*) as jun FROM patients WHERE MONTH(created) = 6");
        $jul = DB::select("SELECT COUNT(*) as jul FROM patients WHERE MONTH(created) = 7");
        $aug = DB::select("SELECT COUNT(*) as aug FROM patients WHERE MONTH(created) = 8");
        $sep = DB::select("SELECT COUNT(*) as sep FROM patients WHERE MONTH(created) = 9");
        $oct = DB::select("SELECT COUNT(*) as oct FROM patients WHERE MONTH(created) = 10");
        $nov = DB::select("SELECT COUNT(*) as nov FROM patients WHERE MONTH(created) = 11");
        $dece = DB::select("SELECT COUNT(*) as dece FROM patients WHERE MONTH(created) = 12");
        return view('System_Admin.home.home', compact('jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dece'));
    }

    public function getpatient(){
        $result = Patient::where('trash',0)->get();
        return view('System_Admin.patient.patient', compact('result'));
    }

    public function storePatient(Request $request){
        $user=Patient::where('username' , $request->username)->OrWhere('email', $request->email)->get();
        if(count($user) > 0){
            return redirect()->back()->with('error','Ooops!, This Username Or Email is Already Exists!');
        }
        $photo_address="uploads/favicon.jpg";
        if($request->file('photo')){
            $file=$request->file('photo');
            $name='uploads/patients/'.time().$file->getClientOriginalName();
            $file->move('uploads/patients/',$name);
            $photo_address=$name;
        }
        $pateint = new Patient();
        $pateint->firstname = $request->firstname;
        $pateint->lastname = $request->lastname;
        $pateint->dob = $request->dob;
        $pateint->username = $request->username;
        $pateint->phone = $request->phone;
        $pateint->email = $request->email;
        $pateint->photo = $photo_address;
        $pateint->password = Hash::make($request->password);
        $pateint->created = Carbon::now();
        $pateint->updated = Carbon::now();
        $pateint->save();
        if($pateint){
            return redirect()->back()->with('success','Patient Registered Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }

    public function updatePatient(Request $request ,$id){
        $user = Patient::where('id',$id)->first();
        $photo_address="uploads/favicon.jpg";
        if($request->file('photo')){
            $file=$request->file('photo');
            $name='uploads/patients/'.time().$file->getClientOriginalName();
            $file->move('uploads/patients/',$name);
            $photo_address=$name;
        }else{
            $photo_address = $user->photo;
        }
        $password="";
        if($request->password ==""){
            $password = $user->password;
        }else{
            $password = Hash::make($request->password);
        }
        $patient=Patient::find($id);
        $patient->firstname = $request->firstname;
        $patient->lastname = $request->lastname;
        $patient->dob = $request->dob;
        $patient->username = $request->username;
        $patient->phone = $request->phone;
        $patient->email = $request->email;
        $patient->photo = $photo_address;
        $patient->password = $password;
        $patient->created = Carbon::now();
        $patient->updated = Carbon::now();
        $patient->save();

        if($patient){
            return redirect()->back()->with('success','Patient Updated Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }

    public function trashPatient($id){
        $patient = Patient::where('id',$id)->update(['trash' => 1]);
        if($patient){
            return redirect()->back()->with('success','Patient Trashed Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }
    public function destroyPatient($id){
        $patient = Patient::where('id',$id)->delete();
        if($patient){
            return redirect()->back()->with('success','Patient Deleted Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }
    public function restorePatient($id){
        $patient = Patient::where('id',$id)->update(['trash' => 0]);
        if($patient){
            return redirect()->back()->with('success','Patient Restored Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }

        // --------------------------------------------- Doctor Part Operation ----------------------------------------------
        public function getdoctor(){
            $result = Doctor::where('trash',0)->get();
            return view('System_Admin.doctor.doctor', compact('result'));
        }

        public function storedoctor(Request $request){

            $user=Doctor::where('username' , $request->username)->OrWhere('email', $request->email)->get();
            if(count($user) > 0){
                return redirect()->back()->with('error','Ooops!, This Username Or Email is Already Exists!');
            }
            $photo_address = "uploads/favican.jpg";
            if($request->file('photo')){
                $file = $request->file('photo');
                $name='uploads/doctors/'.time().$file->getClientOriginalName();
                $file->move('uploads/doctors/',$name);
                $photo_address=$name;
            }
            $doctor = new Doctor();
            $doctor->firstname = $request->firstname;
            $doctor->lastname = $request->lastname;
            $doctor->degree = $request->degree;
            $doctor->username = $request->username;
            $doctor->dob = $request->dob;
            $doctor->phone = $request->phone;
            $doctor->email = $request->email;
            $doctor->password = Hash::make($request->password);
            $doctor->photo =   $photo_address;
            $doctor->created = Carbon::now();
            $doctor->updated = Carbon::now();
            $doctor->save();
            if($doctor){
                return redirect()->back()->with('Success','Doctor Regesterd Successfuly');
            }else{
                return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
            }
        }
        public function updateDoctor(Request $request, $id){
            $user = Doctor::where('id',$id)->first();
            $photo_address = "uploads/favican.jpg";
            if($request->file('photo')){
                $file = $request->file('photo');
                $name='uploads/doctors/'.time().$file->getClientOriginalName();
                $file->move('uploads/doctors/',$name);
                $photo_address=$name;
            }else{
                $photo_address=$user->photo;
            }
            $password="";
            if($request->password=""){
                $password=$user->password;
            }else{
                $password = Hash::make($request->password);
            }

            $doctor=Doctor::find($id);
            $doctor->firstname = $request->firstname;
            $doctor->lastname = $request->lastname;
            $doctor->degree = $request->degree;
            $doctor->dob = $request->dob;
            $doctor->username = $request->username;
            $doctor->phone = $request->phone;
            $doctor->email = $request->email;
            $doctor->photo = $photo_address;
            $doctor->password = $password;
            $doctor->created = Carbon::now();
            $doctor->updated = Carbon::now();
            $doctor->save();

            if($doctor){
                return redirect()->back()->with('success','Doctor Updated Successfully!');
            }else{
                return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
            }
        }
        public function trashDoctor($id){
            $doctor = Doctor::where('id',$id)->update(['trash' => 1]);
            if($doctor){
                return redirect()->back()->with('success','Doctor Trashed Successfully!');
            }else{
                return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
            }
        }
        public function restoreDoctor($id){
            $doctor = Doctor::where('id',$id)->update(['trash' => 0]);
            if($doctor){
                return redirect()->back()->with('Success','Doctor Restored Successfuly');
            }else{
                return redirect()->back()->with('Error','Ooops!, Please check Your Internet Connection! and Try Again');
            }
        }
        public function destroyDoctor($id){
            $doctor = Doctor::where('id',$id)->delete();
            if($doctor){
                return redirect()->back()->with('success','Doctor Deleted Successfully!');
            }else{
                return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
            }
        }

    //------------------------------------------- Appointments Part Operation ---------------------------------------
    public function getAppointments(){
        $doctors = Doctor::all();
        $result = DB::table('appointments')
            ->join('doctors', 'doctors.id', '=' ,'appointments.doctor_id')
            ->select('appointments.id','photo','doctor_id','firstname','lastname','start_time','end_time','number_patient','appointments.created','appointments.updated')
            ->where('appointments.trash', 0)
            ->get();
        return view('System_Admin.appointments.appointment', compact('result', 'doctors'));
    }
    public function storeAppointments(Request $request){
        $app = new Appointment();
        $app->doctor_id = $request->doctor;
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
    public function updateAppointment(Request $request, $id){
        $app=Appointment::find($id);
        $app->doctor_id = $request->doctor;
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
    public function trashAppointment($id){
        $appointment = Appointment::where('id',$id)->update(['appointments.trash' => 1]);
        if($appointment){
            return redirect()->back()->with('success','Appointment Trashed Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }
    public function restoreAppointment($id){
        $appointment = Appointment::where('id',$id)->update(['trash' => 0]);
        if($appointment){
            return redirect()->back()->with('success','Appointment Restored Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }
    public function destroyAppointment($id){
        $appointment = Appointment::where('id',$id)->delete();
        if($appointment){
            return redirect()->back()->with('success','Appointment Deleted Successfully!');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }
    public function ShowAppointmentPatient($id){
        $result = DB::table('appointments')
            ->join('app_patient','appointments.id','=','app_patient.appointment_id')
            ->join('patients','app_patient.patient_id','=','patients.id')
            ->select('app_patient.id','photo','firstname','lastname','app_patient.created','app_patient.updated','appointment_id')
            ->where('appointment_id',$id)
            ->get();
            return view('System_Admin.appointments.appointment_patient',compact('result'));
    }

    //------------------------------------------ Trash Part Operation ---------------------------------------------
    public function trashList(){
        $patient = Patient::where('trash', 1)->get();
        $doctor = Doctor::where('trash', 1)->get();
        $doctors = Doctor::all();
        $appointment = DB::table('appointments')
            ->join('doctors', 'doctors.id', '=' ,'appointments.doctor_id')
            ->select('appointments.id','doctors.photo','doctors.firstname','doctors.lastname','start_time','end_time','number_patient','appointments.created','appointments.updated')
            ->where('appointments.trash', 1)
            ->get();
        return view('System_Admin.trash.trash',compact('patient','doctor','doctors','appointment'));
    }

    public function showProfile(){
        $id = session('user')->id;
        $user = User::where('id',$id)->first();
        return view('System_Admin.account.profile',compact('user'));
    }

    public function updateAccount(Request $request ,$id){
        $user = User::where('id',$id)->first();
        if(!Hash::check($request->current_password, $user->password)){
            return redirect()->back()->with('Error','Current password is incorect');
        }
        if($request->password != $request->confirm_password){
            return redirect()->back()->with('Error','Password and Confirm_Password Mismatch');
        }
        $photo_address="uploads/favicon.jpg";
        if($request->file('photo')){
            $file=$request->file('photo');
            $name='uploads/users/'.time().$file->getClientOriginalName();
            $file->move('uploads/users/',$name);
            $photo_address=$name;
        }else{
            $photo_address = $user->photo;
        }
        $password="";
        if($request->password ==""){
            $password = $user->password;
        }else{
            $password = Hash::make($request->password);
        }

        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->password = $password;
        $user->photo = $photo_address;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        if($user){
            $user = User::where('id',$id)->first();
            session()->put('user',$user);
            return redirect()->back()->with('Success','User Updated Successfuly');
        }else{
            return redirect()->back()->with('error','Ooops!, Please Check Your Internet Connection! and Try Again');
        }
    }

}
