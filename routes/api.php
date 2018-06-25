<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'UsersController@register')->name('register');
Route::post('login', 'UsersController@login')->name('login');

Route::get('/{user}/trackers/show', 'TrackersController@show')->name('user.trackers.show');
Route::get('/{user}/trackers/store', 'TrackersController@store')->name('user.trackers.store');

Route::get('/{user}/{tracker}/coordinates/show', 'CoordinatesController@show')->name('user.tracker.coordinates.show');
Route::post('/{user}/{tracker}/coordinates/store', 'CoordinatesController@store')->name('user.tracker.coordinates.store');

Route::get('/{user}/{tracker}/captures/show', 'CapturesController@show')->name('user.tracker.captures.show');
Route::post('/{user}/{tracker}/captures/store', 'CapturesController@store')->name('user.tracker.captures.store');
