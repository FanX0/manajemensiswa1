<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    function index ()
    {
       return view('pages.admin.dashboard');
    }
    function logout ()
    {
        Auth::logout();
        return redirect ('');
    }
}
