<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\UserController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/home', function(){
    return view('home');
});

Route::get('/', [ChirpController::class, 'index']);

Route::get('/users/{name}', [UserController::class, 'index']);

Route::get('/chirps/{chirp}/view', [ChirpController::class, 'view']);
Route::get('/chirps', [ChirpController::class, 'get']);
Route::post('/chirps', [ChirpController::class, 'store']);
Route::get('/chirps/{chirp}/delete', [ChirpController::class, 'delete']);
Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
Route::post('/chirps/{chirp}/update', [ChirpController::class, 'update']);

Route::view('/register', 'auth.register');

//Route::resource('/chirps', ChirpController::class)->only(['store', 'edit', 'update', 'delete']);