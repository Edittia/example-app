<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('welcome', function () {
    return view('welcome');
});
Route::get('aku', function (){
    return "hallo gaes!";
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
// Route::get('users', [\App\Http\Controllers\UserController::class, 'index']);


//route resource
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@login']);

Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::resource('students', \App\Http\Controllers\StudentController::class);
    Route::resource('users', \App\Http\Controllers\StudentController::class);
    // Route::resource('groups', \App\Http\Controllers\GroupController::class);
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
