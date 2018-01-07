<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'GameController@index');

Route::auth();

Route::get('/home', 'GameController@index');

Route::get('/store', 'GameController@store');

Route::get('/managegame', 'GameController@manageGame');

Route::get('/newgame', 'GameController@newGame');
Route::post('/insertgame', 'GameController@insert');
Route::get('/updategameview/{id}', 'GameController@updateView');
Route::post('/updategame/{id}', 'GameController@updateGame');
Route::get('/deletegame/{id}', 'GameController@delete');
Route::get('/detail/{id}','GameController@detail');

Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@insert');
Route::delete('/cart/{id}', 'CartController@delete');

Route::get('/transaction', 'TransactionController@index');
Route::get('/transaction/detail/{id}', 'TransactionController@detail');
Route::post('/transaction', 'TransactionController@insert');
Route::get('/transaction/delete/{id}','TransactionController@delete');

Route::get('/managegenre', 'GenreController@manageGenre');
Route::get('/newgenre', 'GenreController@newGenre');
Route::post('/insertgenre', 'GenreController@insert');
Route::get('/updategenreview/{id}', 'GenreController@updateView');
Route::post('/updategenre/{id}', 'GenreController@updateGenre');
Route::get('/delete/{id}', 'GenreController@delete');

Route::get('/profile', 'UserController@profile');
Route::post('editprofile','UserController@editProfile');

Route::get('/manageuser','UserController@index');
Route::get('/newuser','UserController@newuser');
Route::post('/insertUser','UserController@insert');
Route::get('/deleteUser/{id}','UserController@delete');