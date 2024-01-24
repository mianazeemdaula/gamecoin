<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class WebController extends Controller
{
    public function login()
    {
        return view('web.auth.login');
    }

    public function doLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (\Auth::attempt($credentials)) {
            $user = auth()->user();
            if($user->hasRole('user')){
                return redirect()->to('/user');
            }else{
                return redirect()->to('/admin');
            }
        }
        return redirect()->back()->withErrors(['password' => 'Invalid Credentials']);
    }

    public function dashboard()
    {
        $user = auth()->user();
        if($user->hasRole('user')){
            return view('user.dashboard');
        }else{
            return view('admin.dashboard');
        }
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('login');
    }
}
