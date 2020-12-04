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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/games', 'APIGamesController@index');

Route::get('/v1/games/{id}', 'APIGamesController@show');

Route::post('/v1/games', 'APIGamesController@store')->middleware('auth.basic.once');

Route::put('/v1/games/{id}', 'APIGamesController@update')->middleware('auth.basic.once');

Route::delete('/v1/games/{id}', 'APIGamesController@destroy')->middleware('auth.basic.once');

Route::put('/v1/games/{id}/buy', 'APIGamesController@putBuy')->middleware('auth.basic.once');

Route::put('/v1/games/{id}/return', 'APIGamesController@putReturn')->middleware('auth.basic.once');

