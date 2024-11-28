<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }
    public function authentication(Request $request){
        $username = $request->username;
        if($username == 'admin'){
            Session::put('userData',$username);
            return redirect('/companies')->with('message','Login Success.');
        }else{
            return redirect('/login')->with('message','Invalid Username');
        }
    }
    public function page_401(){
        return view('401');
    }
    public function logout(){
        Session::flush();
        return redirect('/login')->with('message','Logout success');
    }
}
