<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@index');
    Route::get('roles-and-permissions', 'RolesAndPermissionsController');
});
