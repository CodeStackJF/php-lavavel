<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Auth\Register;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function(){
    return view('home');
});

Route::get('/users/{name}', [UserController::class, 'index']);

Route::get('/chirps/{chirp}/view', [ChirpController::class, 'view']);
Route::get('/chirps', [ChirpController::class, 'get']);
Route::post('/chirps', [ChirpController::class, 'store']);
Route::get('/chirps/{chirp}/delete', [ChirpController::class, 'delete']);
Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
Route::post('/chirps/{chirp}/update', [ChirpController::class, 'update']);

Route::view('/register', 'auth.register');
Route::post('/register', Register::class)->middleware('guest');

Route::get('/logout', LogoutController::class)->middleware('auth');

//Route::resource('/chirps', ChirpController::class)->only(['store', 'edit', 'update', 'delete']);