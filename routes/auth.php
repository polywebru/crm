<?php

use Illuminate\Support\Facades\Route;

Route::post('login', 'LoginController');
Route::post('register', 'RegisterController');
Route::post('logout', 'LogoutController')->middleware('auth');

Route::post('forgot-password', 'ResetPasswordController');
Route::post('reset-password', 'ResetPasswordController@reset');
