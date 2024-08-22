<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeachersController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('teachers', TeachersController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
