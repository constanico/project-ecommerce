<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
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

Route::get('/signin', [SigninController::class, 'index'])->name('signin');
Route::post('/postsignin', [SigninController::class, 'postsignin'])->name('postsignin');
Route::get('/signout', [SigninController::class, 'signout'])->name('signout');

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/postsignup', [SignupController::class, 'postsignup'])->name('postsignup');

Route::group(['middleware' => ['auth','checkrole:admin,user']], function(){
    Route::get('/home', [HomeController::class, 'index']);
    // Route::get('/home', [HomeController::class, 'viewItem']);
    Route::get('/detailproduct', [DetailProductController::class, 'index']);
    Route::get('/cart', [CartController::class, 'index']);
});

Route::group(['middleware' => ['auth','checkrole:admin']], function(){
    Route::get('/additem', [ItemController::class, 'index'])->name('additem');
    Route::post('/additem', [ItemController::class, 'addItem'])->name('additem');
});

