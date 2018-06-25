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

Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/{user}/{tracker}/trace', 'CoordinatesController@trace')->name('user.tracker.trace');
    Route::get('/{user}/{tracker}/last-capture', 'CapturesController@lastCapture')->name('user.tracker.lastCapture');
    Route::get('/{user}/{tracker}/last-coordinate', 'CoordinatesController@lastCoordinate')->name('user.tracker.lastCoordinate');
});

