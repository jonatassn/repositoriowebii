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

// Route::get('/', function () {
//     $msg = "<h1>Rotas Laravel</h1>";
//     $msg .= "<h3>Página Inicial</h3>";
//     return $msg;
// });

Route::get('/', function () {
    return view("main");
});

Route::get('/alunos', 'AlunoController@listar');

Route::get('/professores', function () {
    return "<h1>Página: Professores</h1>";
});

Route::get('/professores', function () {
    return view("professores");
});