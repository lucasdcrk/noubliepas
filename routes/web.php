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

Auth::routes();

Route::middleware('auth')->group(function() {
	Route::get('/', 'HomeController@index')->name('home');
	
	Route::prefix('cartes')->group(function() {
		Route::get('/', 'CartesController@index')->name('cartes.index');
		Route::get('creer', 'CartesController@creer')->name('cartes.creer');
		Route::post('creer', 'CartesController@stocker');
		Route::get('publiques', 'CartesController@publiques')->name('cartes.publiques');
		
		Route::prefix('{id}')->group(function() {
			Route::get('editer', 'CartesController@editer')->name('cartes.editer');
			Route::post('editer', 'CartesController@sauvegarder');
			Route::get('supprimer', 'CartesController@supprimer')->name('cartes.supprimer');
			Route::get('afficher', 'CartesController@afficher')->name('cartes.afficher');
		});
	});
	
	Route::prefix('reviser')->group(function() {
		Route::get('/');
	});
});
