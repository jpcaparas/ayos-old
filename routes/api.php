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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group([
    // Disables auth middleware to expose public, readonly endpoints (e.g. auth)
    'middleware' => 'cors'
    // todo add oauth2 middleware for POST/PUT/DELETE endpoints
], function() {
    Route::resource('/posts', 'Api\PostController', [
        'except' => [
            'create', 'store', 'edit', 'update', 'destroy' // Disable POST verbs, READONLY
        ]
    ]);
});