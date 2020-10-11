<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth User
Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => 'auth:api'], function(){
	// Cage
	Route::post('cage', 'CageController@create');
	Route::get('cage', 'CageController@read');
	Route::put('cage/{cage}', 'CageController@update');
});