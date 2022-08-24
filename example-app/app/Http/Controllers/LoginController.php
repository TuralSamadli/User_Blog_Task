<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    
    public function authenticate(Request $request){
    
        $credentials=$request->validate([
        'email'=>['required','email'],
        'password'=>['required'],

    ]);
    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->route('blog.index');
    }
  return back()->withErrors([
    'email'=>'The provided credentials do not match our records.',
  ])->onlyInput('email');
}
}
