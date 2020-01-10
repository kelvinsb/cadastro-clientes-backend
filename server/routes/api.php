<?php

use Illuminate\Http\Request;

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

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('sexo', 'SexoController@index');
Route::post('cliente', 'ClienteController@criar');
Route::get('cliente', 'ClienteController@listar');
Route::delete('cliente/{id}', 'ClienteController@deletar');
Route::put('cliente/{id}', 'ClienteController@editar');
Route::get('cliente/{id}', 'ClienteController@exibir');
