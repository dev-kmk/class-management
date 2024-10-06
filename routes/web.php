<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeachersController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    if(Auth::check()){
        return view('home');
    }else{
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::resource('teachers', TeachersController::class);

    Route::resource('users', UserController::class);

    Route::get('/roles', [RoleController::class, 'index'])->middleware('manager');

    Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'index'])->middleware('manager');

    Route::get('/class-manager', [App\Http\Controllers\ClassManagerController::class, 'index']);
    Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index']);

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index']);
});