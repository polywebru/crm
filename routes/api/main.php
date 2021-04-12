<?php

use Illuminate\Support\Facades\Route;

Route::get('settings', 'SettingsController');

Route::get('faculties', 'FacultiesController');
Route::get('faculties/{faculty}/specialities', 'SpecialitiesController@getSpecialitiesByFacultyId');
Route::get('specialities', 'SpecialitiesController');
