<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\RoleController;

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
    return view('dashboard');
})->name('dashboard');

Route::resource('buku', BukuController::class)->middleware('iniLogin');
Route::resource('anggota', AnggotaController::class)->middleware('iniLogin');
Route::resource('dashboard', SessionController::class)->middleware('iniLogin');
Route::resource('roles', RoleController::class)->middleware('iniLogin');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');

Route::get('/login', [SessionController::class, 'index'])->middleware('iniTamu');
Route::get('sesi', [SessionController::class, 'index'])->middleware('iniTamu');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('iniTamu');
Route::get('/sesi/logout', [SessionController::class, 'logout']);

Route::get('/commits', [GithubController::class, 'index'])->name('commits.index');
Route::get('/commits/{sha}', [GithubController::class, 'show'])->name('commits.show');
