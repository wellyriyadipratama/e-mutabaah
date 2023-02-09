<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.user-login');
    }

    public function login()
    {
      $credentials = request()->only('email', 'password');
      if (auth()->attempt($credentials)) {
         
          $sessionValue = [
              "id"=>auth()->user()->guru_id!=null?auth()->user()->guru_id:auth()->user()->id,
              "fullName"=>auth()->user()->name,
              "email"=>auth()->user()->email,
              "level"=>auth()->user()->guru_id!=null?'guru':(auth()->user()->ortu_id!=null?'ortu':'admin')
          ];
          request()->session()->put("userData",$sessionValue);
          return redirect('/dashboard');
      }
      return redirect('/')->with(["error"=>"001","message"=>"Email atau Password salah"]);
    }

    public function logout()
    {
            // User::where(['userId'=>auth()->user()->userId])->update(['loginStatus'=>'N']);
            auth()->logout();

            request()->session()->invalidate();
        
            request()->session()->regenerateToken();
        
            return redirect('/');
    }
}
