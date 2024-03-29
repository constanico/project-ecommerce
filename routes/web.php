<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get('/signin', [SigninController::class, 'index'])->name('signin');
Route::post('/postsignin', [SigninController::class, 'postsignin'])->name('postsignin');
Route::get('/signout', [SigninController::class, 'signout'])->name('signout');

Route::get('/signup', [SignupController::class, 'index']);
Route::post('/postsignup', [SignupController::class, 'postsignup'])->name('postsignup');

Route::group(['middleware' => ['auth','checkrole:admin,user']], function(){
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/home/{id}', [ItemController::class, 'detailproduct']);
    Route::get('/search', [HomeController::class, 'search']);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/editpassword', [UserController::class, 'editPassword'])->name('editpassword');
    Route::put('/editpassword', [UserController::class, 'updatePassword'])->name('updatepassword');
    Route::delete('/delete/{name}', [ItemController::class, 'deleteItem']);
});

Route::group(['middleware' => ['auth','checkrole:admin']], function(){
    Route::get('/additem', [ItemController::class, 'index'])->name('additem');
    Route::post('/additem', [ItemController::class, 'addItem'])->name('additem');
});

Route::group(['middleware' => ['auth','checkrole:user']], function(){
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/addToCart/{id}', [CartController::class, 'addToCart']);
    Route::get('/editcart/{id}', [CartController::class, 'editCart'])->name('editcart');
    Route::put('/editcart/{id}', [CartController::class, 'updateCart'])->name('updatecart');
    Route::get('/delete/{id}', [CartController::class, 'deleteCart']);
    Route::get('/editprofile', [UserController::class, 'editProfile'])->name('editprofile');
    Route::put('/editprofile', [UserController::class, 'updateProfile'])->name('updateprofile');
    Route::get('/history', [OrderController::class, 'index']);
    Route::post('/checkout', [OrderController::class, 'checkOut'])->name('checkout');
});

