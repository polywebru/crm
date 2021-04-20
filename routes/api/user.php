<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@index');
    Route::put('/main-info', 'UserController@updateMainInfo');
    Route::put('/contact-info', 'UserController@updateContactInfo');
    Route::put('/additional-info', 'UserController@updateAdditionalInfo');
    Route::put('/avatar', 'UserController@updateAvatar');
    Route::put('/password', 'UserController@updatePassword');
    Route::put('/links', 'UserController@links');
    Route::put('/skills', 'UserController@skills');
    Route::get('roles-and-permissions', 'RolesAndPermissionsController');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('{username}', 'UsersController@index');
    Route::get('{username}/avatar', 'UsersController@avatar');
});
