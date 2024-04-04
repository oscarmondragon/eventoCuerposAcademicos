<?php

use App\Livewire\Participantes\RegistroCreadoMensaje;
use Illuminate\Support\Facades\Route;
use App\Livewire\Participantes\RegistroParticipantes;

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

Route::view('/', 'welcome');

Route::get('/registro-participantes', RegistroParticipantes::class)->name('registro-participantes');
Route::get('/registro-creado', RegistroCreadoMensaje::class)->name('registro.creado');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
