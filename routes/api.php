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
	// Cost
	Route::post('cost', 'CostController@create'); //create
	Route::get('cost', 'CostController@read'); //read
	Route::put('cost/{cost}', 'CostController@update'); //update
	Route::delete('cost/{cost}', 'CostController@delete'); //delete
});