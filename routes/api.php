<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Auth User
Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => 'auth:api'], function(){
	// Cage
	Route::post('cage', 'CageController@create'); //create
	Route::get('cage', 'CageController@read'); //read
	Route::put('cage/{cage}', 'CageController@update'); //update
	// Animal
	Route::post('animal', 'AnimalController@create'); //create
	Route::get('animal', 'AnimalController@read'); //read
	Route::put('animal/{animal}', 'AnimalController@update'); //update
});