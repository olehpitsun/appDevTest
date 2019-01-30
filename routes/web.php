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

/**
 * Director
 */
Route::get('/director','DirectorController@index')->middleware('director') ;
Route::get('/allpersonal','DirectorController@showPersonal')->middleware('director') ;
Route::post('/personal/{id}', 'PersonalController@showOnePersonData')->middleware('director');
Route::get('/settings','DirectorController@settings')->middleware('director') ;
Route::get('/settings/{id}/edit', 'DirectorController@settingsEdit')->middleware('director');
Route::put('/settings/{id}', 'DirectorController@update')->middleware('director');

Route::get('/addUser', 'DirectorController@addUser')->middleware('director');
Route::post('/addUser', 'DirectorController@addUserStore')->middleware('director');

/**
 * Personal
 */
Route::get('/personal','PersonalController@index')->middleware('personal');
Route::get('/personal/create', 'PersonalController@create')->middleware('personal');
Route::post('/personal', 'PersonalController@store')->middleware('personal');


