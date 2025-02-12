<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    function login_view(){
        return view('admin/auth/login');
    }

    public function login_post(Request $request){
        // dd($request);
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);
        $user= Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]);
        if($user==true){
            return redirect()->route('dashboard.index');  
        }else {
            return redirect()->route('admin.login');
        }

 
        
    }
    public function admin_logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
