<?php

use Illuminate\Support\Facades\Route;
use Growats\OkNicLoginSecurity\Http\Controllers\AuthController;
use Growats\OkNicLoginSecurity\Http\Controllers\ProfileController;
use Growats\OkNicLoginSecurity\Http\Controllers\AdminController;

Route::get('/', function () {
   return view('ok-nic-login-security::login'); 
});
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->middleware('decrypt.request');
Route::post('/login/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::post('/admin/users/{user}/assign-role', [AdminController::class, 'assignRole'])->name('admin.assignRole');
    Route::get('/profile', 'ProfileController@show')->name('profile.show');
    Route::post('/profile', 'ProfileController@update')->name('profile.update');
    Route::get('/settings', 'AdminController@showSettings')->name('settings.show');
    Route::post('/settings', 'AdminController@updateSettings')->name('settings.update');
});
