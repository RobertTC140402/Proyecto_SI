<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PreinscripcionController;
use App\Http\Controllers\PracticaController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\TesisController;

Route::view('/','welcome');
Route::view('login','login')->name('login');
Route::view('dashboard','dashboard')->middleware('auth');
Route::view('practicas','practicas')->middleware('auth');

Route::view('tesis','tesis')->middleware('auth');


Route::post('login',[LoginController::class,'login']);
Route::post('logout',[LoginController::class,'logout']);

Route::get('/admin',[AdminController::class,'index'])->middleware('auth.admin')->name('admin.index');
Route::get('/practices',[AdminController::class,'practices'])->middleware('auth.admin')->name('admin.practicas');
//Route::get('/stats',[AdminController::class,'stats'])->middleware('auth.admin')->name('admin.estadisticas');

Route::resource('preinscripcion',PreinscripcionController::class)->middleware('auth');
Route::resource('practica',PracticaController::class)->middleware('auth');
Route::resource('tesis',TesisController::class)->middleware('auth');

Route::put('/{id}/updateu',[PracticaController::class,'updateu'])->name('practica.updateu')->middleware('auth');

Route::get('/{id}/topdf',[PracticaController::class,'topdf'])->middleware('auth')->name('topdf');

Route::get('/judge',[JudgeController::class,'index'])->middleware('auth.judge')->name('judge.index');

