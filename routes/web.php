<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/lupa-password', function() {
    return view('auth.passwords.reset');
})->name('lupa-password');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home');

Route::get('/op-data-guru', function() {
    return view('operator.opdataguru');
})->name('opdataguru');

Route::get('/op-data-staff', function() {
    return view('operator.opdatastaff');
})->name('opdatastaff');

Route::get('/op-data-siswa', function() {
    return view('operator.opdatasiswa');
})->name('opdatasiswa');

Route::get('/op-data-guru/detail', function() {
    return view('operator.detailguru');
})->name('opdetailguru');

Route::get('/op-data-guru/detail-personal', function() {
    return view('operator.detailgurudiri');
})->name('opdetailgurupersonal');

Route::get('/op-data-guru/detail-family', function() {
    return view('operator.detailgurufam');
})->name('opdetailgurufam');
