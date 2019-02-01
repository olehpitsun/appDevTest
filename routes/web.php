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
Route::get('mail/send', 'MailController@send');
/**
 * Director
 */
Route::get('/director','DirectorController@index')->middleware('director') ;
Route::get('/allpersonal','DirectorController@showPersonal')->middleware('director') ;
Route::post('/user/{id}/', 'DirectorController@showOnePersonData')->middleware('director');
Route::get('/addUser', 'DirectorController@addUser')->middleware('director');
Route::post('/addUser', 'DirectorController@addUserStore')->middleware('director');
Route::post('/chooseDate', 'DirectorController@showPersonal')->middleware('director');

/**
 * Settings (director)
 */
Route::get('/settings','SettingsController@index')->middleware('director') ;
Route::get('/settings/{id}/edit', 'SettingsController@settingsEdit')->middleware('director');
Route::put('/settings/{id}', 'SettingsController@update')->middleware('director');

/**
 * Personal
 */
Route::get('/personalDate','PersonalController@index')->middleware('personal');
Route::get('/personal/create', 'PersonalController@create')->middleware('personal');
Route::post('/personal', 'PersonalController@store')->middleware('personal');
Route::post('/personalDate', 'PersonalController@index')->middleware('personal');

Route::get('personal','PersonalController@index')->name('personal')->middleware('personal');

