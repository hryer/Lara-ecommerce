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

Route::get('/managegame', [
 'uses' => 'GameController@manageGame',
 'middleware' => 'roles',
 'roles' => ['admin']
]);

Route::get('/newgame', [
    'uses' => 'GameController@newGame',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::post('/insertgame', [
    'uses' => 'GameController@insert',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/updategameview/{id}', [
    'uses' => 'GameController@updateView',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::post('/updategame/{id}', [
    'uses' => 'GameController@updateGame',
    'middleware' => 'roles',
    'roles' => ['admin']
]);
Route::get('/deletegame/{id}',[
    'uses' => 'GameController@delete',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/detail/{id}',[
    'uses' => 'GameController@detail',
    'middleware' => 'roles',
    'roles' => ['admin','member']
]);

Route::get('/cart', [
    'uses' => 'CartController@index',
    'middleware' => 'roles',
    'roles' => ['admin','member']
]);

Route::post('/cart', [
    'uses' => 'CartController@insert',
    'middleware' => 'roles',
    'roles' => ['admin','member']
]);

Route::delete('/cart/{id}',[
    'uses' => 'CartController@delete',
    'middleware' => 'roles',
    'roles' => ['admin','member']
]);

Route::get('/transaction', [
    'uses' => 'TransactionController@index',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/transaction/detail/{id}', [
    'uses' => 'TransactionController@detail',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::post('/transaction', [
    'uses' => 'TransactionController@insert',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/transaction/delete/{id}',[
    'uses' => 'TransactionController@delete',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/myGame',[
    'uses' => 'TransactionController@myGame',
    'middleware' => 'roles',
    'roles' => ['admin','member']
]);

Route::get('/managegenre', [
    'uses' => 'GenreController@manageGenre',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/newgenre', [
    'uses' => 'GenreController@newGenre',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::post('/insertgenre', [
    'uses' => 'GenreController@insert',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/updategenreview/{id}', [
    'uses' => 'GenreController@updateView',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::post('/updategenre/{id}', [
    'uses' => 'GenreController@updateGenre',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/delete/{id}', [
    'uses' => 'GenreController@delete',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/profile', [
    'uses' => 'UserController@profile',
    'middleware' => 'roles',
    'roles' => ['admin','member']
]);

Route::post('editprofile',[
    'uses' => 'UserController@editProfile',
    'middleware' => 'roles',
    'roles' => ['admin','member']
]);

Route::get('/manageuser',[
    'uses' => 'UserController@index',
    'middleware' => 'roles',
    'roles' => ['admin']
    ])
;
Route::get('/newuser',[
    'uses' => 'UserController@newuser',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::post('/insertUser',[
    'uses' => 'UserController@insert',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/deleteUser/{id}',[
    'uses' => 'UserController@delete',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::get('/editUser/{id}',[
    'uses' => 'UserController@viewUpdate',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::post('/updateUser',[
    'uses' => 'UserController@update',
    'middleware' => 'roles',
    'roles' => ['admin']
]);

Route::post('/assignRole',[
    'uses' => 'UserController@changeRole',
    'middleware' => 'roles',
    'roles' => ['admin']
]);
