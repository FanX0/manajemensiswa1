<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardGuruController extends Controller
{
        function index ()
    {
        echo "Dashboard Siswa";
        echo "<a href='/logout'>Logout</a>";
    }
    function logout ()
    {
        Auth::logout();
        return redirect ('');
    }
}