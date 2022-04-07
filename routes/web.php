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

Route::get('/users', function () {
    return view('users');
})->middleware('auth');

Route::get('/quiz', function () {
    return view('quiz');
})->middleware('auth');

Route::get('/homework', function () {
    return view('homework');
})->middleware('auth');