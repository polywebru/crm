<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@index');
    Route::post('/main-info', 'UserController@updateMainInfo');
    Route::post('/contact-info', 'UserController@updateContactInfo');
    Route::post('/additional-info', 'UserController@updateAdditionalInfo');
    Route::post('/avatar', 'UserController@updateAvatar');
    Route::post('/password', 'UserController@updatePassword');
    Route::post('/links', 'UserController@links');
    Route::post('/skills', 'UserController@skills');
    Route::get('roles-and-permissions', 'RolesAndPermissionsController');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('{username}/avatar', 'UsersController@avatar');
});
