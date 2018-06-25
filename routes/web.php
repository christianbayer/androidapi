<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{user}/{tracker}/last-coordinate', 'CoordinatesController@lastCoordinate')->name('user.tracker.lastCoordinate');
Route::get('/{user}/{tracker}/last-capture', 'CapturesController@lastCapture')->name('user.tracker.lastCapture');