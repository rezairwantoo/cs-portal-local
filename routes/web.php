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

Route::get('/register-school', function() {
    return view('register-school');
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

Route::get('/op-data-guru/detail-study', function() {
    return view('operator.detailgurustudy');
})->name('opdetailgurustudy');

Route::get('/op-data-op/detail-personal', function() {
    return view('operator.detailopdiri');
})->name('opdetailoppersonal');

Route::get('/op-data-op/detail-family', function() {
    return view('operator.detailopfam');
})->name('opdetailopfam');

Route::get('/op-data-op/detail-study', function() {
    return view('operator.detailopstudy');
})->name('opdetailopstudy');

Route::get('/op-data-siswa/detail', function() {
    return view('operator.detailsiswa');
})->name('opdetailsiswa');

Route::get('/op-data-siswa/detail-diri', function() {
    return view('operator.detailsiswadiri');
})->name('opdetailsiswadiri');

Route::get('/op-data-siswa/detail-family', function() {
    return view('operator.detailsiswafam');
})->name('opdetailsiswafam');

Route::get('/op-kehadiran-siswa', function() {
    return view('operator.kehadiransiswa');
})->name('opkehadiransiswa');

Route::get('/op-laporan-nilai-siswa', function() {
    return view('operator.laporannilaisiswa');
})->name('oplaporannilaisiswa');

Route::get('/op-laporan-nilai-siswa/semester-detail', function() {
    return view('operator.laporansemester');
})->name('oplaporannilaisemester');

Route::get('/op-laporan-nilai-siswa/harian-siswa', function() {
    return view('operator.laporanhariansiswa');
})->name('oplaporanhariansiswa');

Route::get('/op-jadwal-pelajaran', function() {
    return view('operator.jadwalpelajaran');
})->name('opjadwalpelajaran');

Route::get('/op-jadwal-pelajaran/add', function() {
    return view('operator.jadwaladd');
})->name('opjadwaladd');

Route::get('/op-jadwal-pelajaran/edit', function() {
    return view('operator.jadwaledit');
})->name('jadwaledit');

Route::get('/op-mata-pelajaran', function() {
    return view('operator.matapelajaran');
})->name('matapelajaran');

Route::get('/op-mata-pelajaran/add', function() {
    return view('operator.matapelajaranadd');
})->name('matapelajaran');

Route::get('/op-modul', function() {
    return view('operator.modul');
})->name('modul');

Route::get('/op-kelas', function() {
    return view('operator.kelas');
})->name('kelas');