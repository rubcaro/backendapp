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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Banco de sangre
Route::get('/banco-sangre/ingresar-notificacion', 'BancoSangreController@seeAddNotification')
    ->name('seeAddNotification');
Route::get('/banco-sangre/ver-notificaciones', 'BancoSangreController@seeNotifications')
    ->name('seeNotifications');

//Encuestas
Route::get('/encuestas', 'EncuestasController@seeEncuestas')->name('survey');