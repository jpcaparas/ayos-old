<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect()->route('landing.coming_soon');
});

Route::get('/coming_soon', 'LandingController@comingSoon')->name('landing.coming_soon');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
