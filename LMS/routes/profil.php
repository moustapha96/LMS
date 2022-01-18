<?php

use Illuminate\Support\Facades\Route;

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



//TOUTES LES ROUTES QUI NECESSITENT ETRE CONNECTÉ SONT PLACEES ICI
Route::group(['middleware' => ['auth']], function () 
{
	
	
	Route::get('/mot-de-passe', 'UsersController@pwd')->name('mdp');
	
	Route::patch('/mot-de-passe', 'UsersController@update_pwd')->name('mdp.edit');
	
	Route::get('/profil', 'UsersController@profil')->name('profil');
	
	Route::patch('modifier-profil','UsersController@update_profil')->name('user.update_profil');
	
	Route::post('/profil-image', 'UsersController@update_avatar')->name('user.update_avatar');
	
	
});