<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TrustHosts;
use App\Models\Requsts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        if(isset( $_COOKIE['user_id'])){
            $user_id = $_COOKIE['user_id'];
            $user=user::where('id' , $user_id)->first();
            if($user){
                session()->put('user', $user);
                return redirect()->route('admin.home')->with('success', 'wellcom to admin page!');
            }
        }

        return view('User.Login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username'=>'email|required',
            'password'=> 'required'
        ]);
        $user = user::where('email', $request->username)->orwhere('username',
        $request->username)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if($request->remember){
                    setcookie('user_id',$user->id , time()+ (86400 * 30 ), '/' );
                }
                session()->put('user', $user);
                return redirect()->route('admin.home')->with('success', 'wellcom to admin page!');

            } else {
                return redirect()->back()->with('error', 'Incorect username or password!');
            }
        } else {
            return redirect()->back()->with('error', 'Incorrect username or password!');
        }
    }
    public function logout(){
        session()->flush();
        setcookie('user_id',"", time()- 3600 ,'/');
        return redirect()->route('home');
    }
}
