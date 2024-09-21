<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeachersController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::middleware('auth')->group(function(){
//     Route::resource('teachers', TeachersController::class);

//     Route::resource('users', UserController::class);
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::resource('teachers', TeachersController::class);

    Route::resource('users', UserController::class);

    Route::get('/roles', [RoleController::class, 'index']);

    Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'index']);

    Route::get('/class-manager', [App\Http\Controllers\ClassManagerController::class, 'index']);

    Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index']);
});