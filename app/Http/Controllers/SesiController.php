<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
  function index ()
    {
        return view('auth.login');
    }

    function login (Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

       $infologin = [
              'email' => $request->email,
              'password' => $request->password
         ];

        if (Auth::attempt($infologin)) {
            if(Auth::user()->role == 'admin') {
                return redirect ('/admin/dashboard');
            } elseif (Auth::user()->role == 'guru') {
                return redirect ('/guru/dashboard');
            } elseif (Auth::user()->role == 'siswa') {
                return redirect ('/siswa/dashboard');
            } else {
                return redirect ('')->withErrors('Email atau Password Salah')->withInput();
    }
    }
    }

    function logout ()
    {
        Auth::logout();
        return redirect ('');
    }
}