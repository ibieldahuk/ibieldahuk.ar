<?php

use App\Http\Controllers\AutenticacionController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('iniciarSesion', [AutenticacionController::class, 'mostrarFormularioDeRegistro'])->name('login');
Route::post('iniciarSesion', [AutenticacionController::class, 'login']);
Route::get('registrar', [AutenticacionController::class, 'mostrarFormularioDeRegistro'])->name('registrar');
Route::post('registrar', [AutenticacionController::class, 'register']);
Route::post('cerrarSesion', [AutenticacionController::class, 'logout'])->name('logout');

