<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UsersController@index');
    Route::post('{user}/activate', 'UsersController@activate');
    Route::post('{user}/deactivate', 'UsersController@deactivate');
    Route::post('{user}/change-status', 'UsersController@changeStatus');
    Route::delete('{user}/delete', 'UsersController@delete');
});
