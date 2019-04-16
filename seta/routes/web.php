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
    return view("main");
});

Route::get('/alunos', 'AlunoController@listar');

Route::get('/professores', function () {
    return view("professores");
});

Route::get('/cursos', 'CursoController@listar');
Route::get('/cursos/cadastrar', 'CursoController@cadastrar');
