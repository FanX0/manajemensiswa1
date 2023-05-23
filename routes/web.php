<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;


use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\UsersController;

use App\Http\Controllers\Siswa\DashboardSiswaController;


use App\Http\Controllers\Guru\DashboardGuruController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/home',function(){
    return redirect('/admin/dashboard');
});

//menggunakan middleware auth
Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});

Route::auth();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin 
Route::middleware(['auth'])->group(function () {

//Admin
Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->middleware('userAkses:admin');
Route::get('/admin/users', [UsersController::class, 'index'])->name('users.index')->middleware('userAkses:admin');
//Siswa
Route::get('/siswa/dashboard', [DashboardSiswaController::class, 'index'])->middleware('userAkses:siswa');

//Guru
Route::get('/guru/dashboard', [DashboardGuruController::class, 'index'])->middleware('userAkses:guru');

Route::get('/logout', [SesiController::class, 'logout']);
});

