<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserAuthController;
use Illuminate\Http\Request;
use App\models\User;
use App\models\Doctor;
use App\models\Patient;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function index()
    {
        // return view('Website.index');
        if(isset($_COOKIE['user_id'])){
            $user_id=$_COOKIE['user_id'];
            $user=User::where('id',$user_id)->first();

            if($user){
                session()->put('user',$user);
                return redirect()->route('admin.home')->with('success', 'You are Successfully Logined');
            }
        }
        return view('User.login');
    }
   public function login(Request $request)
   {
        $request->validate([
            'username' => 'email|required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->username)
                        ->orWhere('username',$request->username)
                            ->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                if($request->remember){
                    setcookie('user_id',$user->id, time()+(86400 * 30),'/');
                }
                session()->put('user',$user);
                return redirect()->route('admin.home')->with('success', 'You are Successfully Logined');
            }else{
                return redirect()->back()->with('error' , 'Incorect Username or Password');
            }
        }else{
            return redirect()->back()->with('error' , 'Incorect Username or Password');
        }
   }
   public function logout()
   {
        session()->flush();
        setcookie('user_id',"",time()-3600,'/');
        return redirect()->route('home');
   }





//    Doctor Side...
   public function ShowUserLogin(){
    return view('Website.users.login');
   }

   public function doctorLogin(Request $request)
   {
        $request->validate([
            'username' => 'email|required',
            'password' => 'required'
        ]);

        $user = Doctor::where('email', $request->username)
                        ->orWhere('username',$request->username)
                             ->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                if($request->remmber){
                    setcookie('user_id',$user->id, time()+(86400 * 30),'/');
                }
                session()->put('doctor',$user);
                return redirect()->route('doctor.home')->with('success', 'You are Successfully Logined');
            }else{
                return redirect()->back()->with('error' , 'Incorect Username or Password');
            }
        }else{
            return redirect()->back()->with('error' , 'Incorect Username or Password');
        }
   }

   public function patientLogin(Request $request){
    $request->validate([
        'username' => 'email|required',
        'password' => 'required'
    ]);

    $user = Patient::where('email', $request->username)
                    ->orWhere('username',$request->username)
                         ->first();
    if($user){
        if(Hash::check($request->password, $user->password)){
            if($request->remmber){
                setcookie('user_id',$user->id, time()+(86400 * 30),'/');
            }
            session()->put('patient',$user);
            return redirect()->route('patient.home')->with('success', 'You are Successfully Logined');
        }else{
            return redirect()->back()->with('error' , 'Incorect Username or Password');
        }
    }else{
        return redirect()->back()->with('error' , 'Incorect Username or Password');
    }
   }
}
