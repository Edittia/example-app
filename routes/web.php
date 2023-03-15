<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SurveysController;


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/surveys', [SurveysController::class, 'index']);
Route::post('/surveys', [SurveysController::class, 'store']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
// Route::post('login', [ 'as' => 'login', 'users' => 'LoginController@login']);
Route::middleware(['auth', 'user-access'])->group(function () {
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::resource('students', \App\Http\Controllers\StudentController::class);
    Route::resource('group', 'App\Http\Controllers\GroupController');
    Route::resource('member', 'App\Http\Controllers\MemberController');
    Route::resource('schedule', 'App\Http\Controllers\ScheduleController');
    Route::resource('presence', 'App\Http\Controllers\PresenceController');
    Route::get('groups/{id}/attendances', [GroupController::class, 'attendances']); 
    Route::resource('quiz', 'App\Http\Controllers\QuizController');
    Route::resource('question', 'App\Http\Controllers\QuestionController');
});



Auth::routes();


