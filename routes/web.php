<?php

use App\Livewire\Admin\Asistentes;
use App\Livewire\Admin\Banners;
use App\Livewire\Admin\RegistroDetail;
use App\Livewire\Participantes\AdjuntarBoucherCorreo;
use App\Livewire\Participantes\BuscarRegistroParticipantes;
use App\Livewire\Participantes\RegistroCreadoMensaje;
use Illuminate\Support\Facades\Route;
use App\Livewire\Participantes\RegistroParticipantes;
use App\Livewire\Admin\RegistroParticipantesShow;


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
//RUTAS invitado publico
Route::get('/registro-participantes', RegistroParticipantes::class)->name('registro-participantes');
Route::get('/registro-creado', RegistroCreadoMensaje::class)->name('registro.creado');
//Route::get('/registro/{id}/completar', AdjuntarBoucherCorreo::class)->name('boucher.completar');
//Route::get('/registro-buscar', BuscarRegistroParticipantes::class)->name('registro.buscar');


Route::get('/', RegistroParticipantes::class)->name('home');


//Rutas deshabilitadas por que aun no se programa la parte de usuarios y administradores del sistema
/* Route::view('dashboard', 'dashboard')
->middleware(['auth', 'verified'])
->name('dashboard'); */

//RUTAS ADMIN
Route::get('/participantes', RegistroParticipantesShow::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/banners', Banners::class)->middleware(['auth', 'verified'])->name('banners');
Route::get('/asistentes', Asistentes::class)->middleware(['auth', 'verified'])->name('asistentes');
Route::get('/registro/{id}/revision', RegistroDetail::class)->name('registro.revisar');



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
