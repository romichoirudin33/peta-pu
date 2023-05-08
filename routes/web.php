<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CapaianController;

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

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/peta', [PetaController::class, 'index'])->name('peta.index');
Route::get('/data', [DataController::class, 'index'])->name('data.index');
Route::get('/capaian', [CapaianController::class, 'index'])->name('capaian.index');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login_action'])->name('login.login_action');

Route::middleware('auth')->group(function (){
    Route::get('edit', [LandingController::class, 'edit'])->name('home.edit');
    Route::post('edit', [LandingController::class, 'store'])->name('home.store');

    Route::resource('image-assets', \App\Http\Controllers\ImageAssetController::class);
    Route::resource('file-drives', \App\Http\Controllers\FileDriveController::class, ['only' => ['index', 'store', 'destroy']]);

    Route::get('/peta/create', [PetaController::class, 'create'])->name('peta.create');
    Route::post('/peta', [PetaController::class, 'store'])->name('peta.store');
    Route::get('/peta/{id}/edit', [PetaController::class, 'edit'])->name('peta.edit');
    Route::post('/peta/{id}', [PetaController::class, 'update'])->name('peta.update');
    Route::delete('/peta/{id}/destroy', [PetaController::class, 'destroy'])->name('peta.destroy');

    Route::get('/data/create', [DataController::class, 'create'])->name('data.create');
    Route::post('/data', [DataController::class, 'store'])->name('data.store');
    Route::get('/data/{id}', [DataController::class, 'show'])->name('data.show');
    Route::get('/data/{id}/edit', [DataController::class, 'edit'])->name('data.edit');
    Route::post('/data/{id}', [DataController::class, 'update'])->name('data.update');
    Route::delete('/data/{id}/destroy', [DataController::class, 'destroy'])->name('data.destroy');

    Route::get('/capaian/create', [CapaianController::class, 'create'])->name('capaian.create');
    Route::post('/capaian', [CapaianController::class, 'store'])->name('capaian.store');
    Route::get('/capaian/{id}/edit', [CapaianController::class, 'edit'])->name('capaian.edit');
    Route::post('/capaian/{id}', [CapaianController::class, 'update'])->name('capaian.update');
    Route::delete('/capaian/{id}/destroy', [CapaianController::class, 'destroy'])->name('capaian.destroy');

    Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::get('reset_password', [LoginController::class, 'reset_password'])->name('login.reset_password');
    Route::post('reset_password', [LoginController::class, 'reset_password_action'])->name('login.reset_password_action');
});
