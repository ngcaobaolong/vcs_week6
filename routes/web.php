<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/account', 'App\Http\Controllers\AccountController@show')->middleware('auth')->name('showAccountInfo');
Route::post('/account', 'App\Http\Controllers\AccountController@post')->middleware('auth')->name('editAccountInfo');

Route::get('/users', 'App\Http\Controllers\UsersController@show')->middleware('auth')->name('showUsers');

Route::get('/users/adduser', function () {
    return view('adduser');
})->middleware('auth')->name('addUser');

Route::post('/users/adduser', 'App\Http\Controllers\UsersController@post')->middleware('auth')->name('addUser');

Route::get('/quiz', 'App\Http\Controllers\QuizController@show')->middleware('auth')->name('showQuiz');
Route::post('/quiz', 'App\Http\Controllers\QuizController@post')->middleware('auth')->name('addQuiz');

Route::get('/homework', 'App\Http\Controllers\HomeworkController@show')->middleware('auth')->name('showHomework');
Route::post('/homework', 'App\Http\Controllers\HomeworkController@post')->middleware('auth')->name('showHomework');
