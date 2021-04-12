<?php

use Illuminate\Support\Facades\Route;

Route::get('settings', 'SettingsController');

Route::get('faculties', 'FacultiesController');
Route::get('faculties/{faculty}/specialities', 'FacultiesController@getSpecialitiesByFacultyId');
Route::get('specialities', 'SpecialitiesController');

Route::get('roles', 'RolesAndPermissionsController@roles');
Route::get('roles/{role}/permissions', 'RolesAndPermissionsController@permissionsByRole');
Route::get('permissions', 'RolesAndPermissionsController@permissions');
