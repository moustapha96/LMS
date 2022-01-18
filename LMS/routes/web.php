<?php

use App\Models\Course;
use App\Models\Teacher;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'UserController@accueille')->name('accueille');

Route::get('/a-propos','UserController@apropos')->name('apropos');

Route::get('/contact','UserController@contact')->name('contact');

Route::get('/service','UserController@service')->name('service');

Route::get('/cours', 'UserController@cours')->name('cours');

Route::get('/categories','UserController@categories')->name('categories');


Route::get('/quiz','UserController@quiz')->name('quiz');


Route::get('/page-introuvable',function(){
	return view('errors.notfound');
});

Route::post('/contact/envoie','UserController@sendContact')->name('contact.envoie');


Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('utilisateur/profil', 'UsersController@profil')->name('profil');
	
	Route::post('utilisateur/modifier-profil','UsersController@update_profil')->name('user.update_data_profil');

    Route::get('/mot-de-passe', 'UsersController@pwd')->name('mdp');
    
	Route::PATCH('/mot-de-passe', 'UsersController@update_pwd')->name('mdp.edit');

	Route::post('/profil-image', 'UsersController@update_avatar')->name('user.update_profil');


	
});
