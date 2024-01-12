<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('Auth.login');
});

//Authentication
Route::post('/login',[App\Http\Controllers\LoginController::class, 'login']);
Route::get('/logout',[App\Http\Controllers\LoginController::class, 'logout']);



//Administrator
Route::middleware(['auth','role:ADMIN'])->group(function(){
    Route::get('/admin-dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index']);
});

//Seller
Route::middleware(['auth','role:SELLER'])->group(function(){
    Route::get('/seller-dashboard', [App\Http\Controllers\Seller\SellerController::class, 'index']);
});

//Buyer
Route::middleware(['auth','role:BUYER'])->group(function(){
    Route::get('/buyer-dashboard', [App\Http\Controllers\Buyer\BuyerController::class, 'index']);
});





Route::get('/direct',[App\Http\Controllers\Admin\AdminController::class, 'testRedirect']);

Route::get('/sessions', function(){
    return Session::all();
});
