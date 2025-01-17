<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;

use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Login');
});
Route::get('/register', function () {
    return Inertia::render('Register');
});
Route::get('/home', function () {
    return Inertia::render('Home');
});

Route::get('/user', [AuthController::class, 'userProfile'])->middleware('auth');

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login']);


