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
	Route::get('/', 'AccueilController@index')->name('accueil');
	
	Route::prefix('cartes')->group(function() {
		Route::get('/', 'CartesController@index')->name('cartes.index');
		Route::get('creer', 'CartesController@creer')->name('cartes.creer');
		Route::post('creer', 'CartesController@stocker');
		
		Route::prefix('{id}')->group(function() {
			Route::get('afficher', 'CartesController@afficher')->name('cartes.afficher');
			Route::get('editer', 'CartesController@editer')->name('cartes.editer');
			Route::post('editer', 'CartesController@sauvegarder');
			Route::get('supprimer', 'CartesController@supprimer')->name('cartes.supprimer');
		});
	});

    Route::prefix('cartes-publiques')->group(function() {
        Route::get('/', 'CartesPubliquesController@index')->name('cartes-publiques.index');
        Route::get('creer', 'CartesPubliquesController@creer')->name('cartes-publiques.creer');
        Route::post('creer', 'CartesPubliquesController@stocker');

        Route::prefix('{id}')->group(function() {
			Route::get('afficher', 'CartesPubliquesController@afficher')->name('cartes-publiques.afficher');
            Route::get('editer', 'CartesPubliquesController@editer')->name('cartes-publiques.editer');
            Route::post('editer', 'CartesPubliquesController@sauvegarder');
            Route::get('supprimer', 'CartesPubliquesController@supprimer')->name('cartes-publiques.supprimer');
            Route::get('copier', 'CartesPubliquesController@copier')->name('cartes-publiques.copier');
        });
	});
	
    Route::prefix('matieres')->group(function() {
        Route::get('/', 'MatieresController@index')->name('matieres.index');
        Route::get('creer', 'MatieresController@creer')->name('matieres.creer');
        Route::post('creer', 'MatieresController@stocker');

        Route::prefix('{id}')->group(function() {
			Route::get('afficher', 'MatieresController@afficher')->name('matieres.afficher');
            Route::get('editer', 'MatieresController@editer')->name('matieres.editer');
            Route::post('editer', 'MatieresController@sauvegarder');
            Route::get('supprimer', 'MatieresController@supprimer')->name('matieres.supprimer');
            Route::get('copier', 'MatieresController@copier')->name('matieres.copier');
        });
    });
	
	Route::prefix('reviser')->group(function() {
	    Route::get('/', 'RevisionController@choix_matiere')->name('reviser.choix_matiere');
        Route::get('tout', 'RevisionController@reviser_tout')->name('reviser.tout');
        Route::get('{id}', 'RevisionController@reviser_matiere')->name('reviser.matiere');
        Route::prefix('carte/{carte}')->group(function () {
            Route::get('ok', 'RevisionController@je_savais');
            Route::get('ko', 'RevisionController@je_ne_savais');
        });
	});
});
