<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\CityController;


Route::get('/', [CountyController::class, 'index']);

Route::resource('counties', CountyController::class);
Route::resource('cities', CityController::class);
Route::resource('counties.cities', CityController::class);