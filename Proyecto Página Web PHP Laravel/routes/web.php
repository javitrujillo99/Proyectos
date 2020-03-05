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
    return redirect()->action('GamesController@getIndex');
});


Route::get('games', 'GamesController@getIndex')->name('games');


Route::get('games/show/{id}', 'GamesController@getShow')
    ->middleware('auth')
    ->middleware('verified');

Route::get('games/edit/{id}', 'GamesController@getEdit')->middleware('auth');

Route::get('games/create', 'GamesController@getCreate')->middleware('auth');

Auth::routes(['verify' => true]);

Route::get('/home', function() {
    return redirect()->action('GamesController@getIndex');
});

Route::post('games/create', 'GamesController@postCreate')->middleware('auth');

Route::put('games/edit/{id}', 'GamesController@putEdit')->middleware('auth');

Route::put('games/return/{id}', 'GamesController@putReturn')->middleware('auth');

Route::put('games/buy/{id}', 'GamesController@putBuy')
    ->middleware('auth')
    ->middleware('no_comprar');


Route::delete('games/delete/{id}', 'GamesController@deletePartido')->middleware('auth');

Route::get('usuarios', 'UsuariosController@getUsuarios')->middleware('auth');

Route::get('usuarios/edit/{id}', 'UsuariosController@getEdit')->middleware('auth');

Route::put('usuarios/edit/{id}', 'UsuariosController@putEdit')->middleware('auth');

Route::delete('usuarios/delete/{id}', 'UsuariosController@deleteUsuario')->middleware('auth');