<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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
Auth::routes(['register' => false]);
Route::get('/factures', 'HomeController@factures')->name('app.factures');
Route::get('/factures/add', 'HomeController@addFacture')->name('factures.add');
Route::post('/factures/store', 'HomeController@storeFacture')->name('factures.store');
Route::get('/{id_consultation}/fiche', 'HomeController@efiche')->name('esoins.fiche');
Route::get('/{id_consultation}/delete', 'HomeController@deleteFacture')->name('esoins.delete');

Route::get('/esoins', 'HomeController@index')->name('app.home');
Route::get('/consultations', 'HomeController@econsultation')->name('app.consultation');
Route::get('/consultation-add/{id}', 'HomeController@addConsultation')->name('consultation.add');
Route::post('/consultation-store', 'HomeController@storeConsultation')->name('consultation.store');
Route::get('/jsondata', 'HomeController@getjson')->name('esoins.getjson');
Route::get('/ordonnance', 'HomeController@ordonnance')->name('esoins.ordonnance');
Route::post('/ordonnance', 'HomeController@save')->name('ordonnance.save');
Route::get('/selection', 'HomeController@selection')->name('root.selection');
Route::get('/netsigl', 'HomeController@datanetsigl')->name('esoins.nets');
Route::get('/dispensation', 'HomeController@dispensation')->name('esoins.dispensation');
Route::get('/ckeck-ordonnance', 'HomeController@checkOrdonnance')->name('ordonnance.check');
Route::get('/get-stat', 'HomeController@getStat')->name('data.stat');
Route::post('/filter', 'HomeController@dataFilter')->name('data.filter');
Route::get('/', [LoginController::class, 'userLogin'])->name('user.login');

// Livres
// Route::resource('livres', 'LivreController');
// Creance-dettes
// Route::resource('creancedettes', 'CreanceDetteController');
// Paiements
// Route::resource('paiements', 'PaiementController');
// Structures
Route::resource('structures', 'StructureController');
// Users
Route::resource('users', 'UserController');
Route::get('/users/{id}/delete', 'UserController@delete')->name('users.delete');
// Patients
Route::resource('patients', 'PatientController');

// Roles
Route::resource('roles', 'RoleController');
// Permissions
Route::resource('permissions', 'PermissionController');
// Parametres
Route::resource('parametres', 'ParametreController');
// Valeurs
Route::resource('valeurs', 'ValeurController');
// Exercices
// Route::resource('exercices', 'ExerciceController');

// Selection
// Route::get('/selection', 'HomeController@selection')->name('root.selection');

// Payment creante - dette
// Route::get('/creancedette/{id}', 'CreanceDetteController@payment')->name('creancedette.payment');
// Payment creante - dette
// Route::post('/creancedette/{id}', 'CreanceDetteController@payer')->name('creancedette.payer');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// VIEW IMPORT
Route::get('/import', [
	'as'=>'view.data',
	'uses'=>'ImportController@viewCsv'

]);

// IMPORT
Route::post('/import-data', [
	'as'=>'import.data',
	'uses'=>'ImportController@importCsv'

]);
