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
|https://scotch.io/tutorials/token-based-authentication-for-angularjs-and-laravel-apps
 https://scotch.io/tutorials/role-based-authentication-in-laravel-with-jwt
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API route group that we need to protect
Route::group(['middleware' => ['ability:admin,create-users']], function()
{
    // Protected route
    Route::get('users', 'JwtAuthenticateController@index');
});

Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
Route::post('authenticate', 'AuthenticateController@authenticate');
