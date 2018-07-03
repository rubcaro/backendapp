<?php

use Illuminate\Http\Request;
use App\Http\Controllers\BancoSangreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('ingresar-notificacion', 'BancoSangreController@storeNotification');

// Encuestas
Route::post('ingresar-encuesta', 'EncuestaController@store');
Route::get('encuesta/{id}', 'EncuestaController@show');
Route::get('/encuestas/{id}/resultados', 'EncuestaController@showResults');
Route::get('/encuestas', 'EncuestaController@showEncuestas');
Route::post('ingresar-resultado', 'EncuestaController@storeResult');