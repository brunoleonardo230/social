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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');

Route::get('/my-perfil', 'PerfilController@myPerfil')->name('myperfil');

Route::get('/perfil-user/{id}', 'PerfilController@perfilUser')->name('perfiluser'); 

Route::get('/find', 'PerfilController@find');

Route::get('/follow/{id}', 'PerfilController@follow');

Route::get('/users', 'UserController@users')->name('users');

Route::get('/user/{id}/disable', 'UserController@disable');