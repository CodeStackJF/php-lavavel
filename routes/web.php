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
Route::get('/chirp/{id}', [ChirpController::class, 'get']);

Route::post('/chirp', [ChirpController::class, 'store']);