<?php

use Illuminate\Support\Facades\Route;

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

//Rota para mostrar lista de usuarios
Route::get('/usuarios', 'UsuariosController@index');
//Rota para formulário de novo usuário
Route::get('/usuarios/new', 'UsuariosController@new');
//Rota para adicionar efetivamente o usuário
Route::post('/usuarios/add', 'UsuariosController@add');
//Rota para formulário para alterar dados
Route::get('/usuarios/{id}/edit', 'UsuariosController@edit');
//Rota para efetuar alteração
Route::post('/usuarios/update/{id}', 'UsuariosController@update');
//Rota para excluir usuário
Route::delete('/usuarios/delete/{id}', 'UsuariosController@delete');