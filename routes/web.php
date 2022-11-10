<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome', [
        "title" => "Welcome"
    ]);
});

Route::get('/signin', [SigninController::class, 'index']);
Route::get('/signup', [SignupController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);