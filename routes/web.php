<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeachersController;

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('teachers', TeachersController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);