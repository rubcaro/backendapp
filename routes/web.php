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

Route::get('/', 'Auth\LoginController@showLogin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Banco de sangre
Route::get('/banco-sangre/ingresar-notificacion', 'BancoSangreController@seeAddNotification')
    ->name('seeAddNotification');
Route::get('/banco-sangre/ver-notificaciones', 'BancoSangreController@seeNotifications')
    ->name('seeNotifications');

//Encuestas
Route::get('/encuestas', 'EncuestaController@seeEncuestas')->name('survey');
Route::get('/crear-encuesta', 'EncuestaController@seeCreateEncuesta')->name('seeCreateEncuesta');
Route::get('/encuestas/{id}/resultados', 'EncuestaController@seeResults')->name('seeResults');
Route::get('/encuestas/{id}', 'EncuestaController@seeEncuesta')->name('seeEncuesta');

// Testing
Route::get('/loaderio-308a469d9826b163fc4bfcb251f40c19', function() {
    return 'loaderio-308a469d9826b163fc4bfcb251f40c19';
  });