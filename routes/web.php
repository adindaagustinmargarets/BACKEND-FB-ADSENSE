<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//backend
Route::prefix('backend')->group(function () {
    //dashboard
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
    //Profile
    Route::get('/profile', [App\Http\Controllers\Auth\Akun\AkunController::class, 'index'])->name('akun.index');
    Route::post('/profile', [App\Http\Controllers\Auth\Akun\AkunController::class, 'simpan'])->name('akun.simpan');
    //berita
    Route::get('/berita', [App\Http\Controllers\Backend\Admin\BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/tambah', [App\Http\Controllers\Backend\Admin\BeritaController::class, 'tambah_view'])->name('berita.tambah-view');
    Route::post('/berita/tambah', [App\Http\Controllers\Backend\Admin\BeritaController::class, 'tambah'])->name('berita.tambah');
    Route::delete('berita/hapus/{id}', [App\Http\Controllers\Backend\Admin\BeritaController::class, 'hapus'])->name('berita.hapus');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
