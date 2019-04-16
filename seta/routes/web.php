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

Route::post('/cursos/salvar/{id}', 'CursoController@salvar');

Route::get('/cursos/editar/{id}', 'CursoController@editar');

Route::post('/cursos/editar/salvar/{id}', 'CursoController@salvar');

Route::get('/cursos/remover/{id}','CursoController@remover');

Route::get('/disciplina', 'DisciplinaController@listar');
Route::get('/disciplina/cadastrar', 'DisciplinaController@cadastrar');
Route::get('/disciplina/editar/{id}', 'DisciplinaController@editar');
Route::post('/disciplina/salvar/{id}', 'DisciplinaController@salvar');
Route::post('/disciplina/remover/{id}', 'DisciplinaController@remover');
Route::post('/disciplina/confirmar/{id}', 'DisciplinaController@confirmar');

Route::get('/conteudo/cadastrar/{id}', 'ConteudoController@cadastrar');
Route::get('/conteudo/editar/{id}', 'ConteudoController@editar');
Route::post('/conteudo/salvar/{id}', 'ConteudoController@salvar');
Route::get('/conteudo/remover/{id}', 'ConteudoController@remover');
Route::get('/conteudo/confirmar/{id}', 'ConteudoController@confirmar');

Route::get('/atividade/cadastrar/{id}', 'AtividadeController@cadastrar');
Route::get('/atividade/editar/{id}', 'AtividadeController@editar');
Route::post('/atividade/salvar/{id}', 'AtividadeController@salvar');
Route::get('/atividade/remover/{id}', 'AtividadeController@remover');
Route::get('/atividade/confirmar/{id}', 'AtividadeController@confirmar');

Route::get('/peso/editar/{id}', 'PesoController@editar');
Route::post('/peso/salvar/{id}', 'PesoController@salvar');

Route::get('/conceito', 'ConceitoController@listar');
Route::get('/relatorio', 'RelatorioController@listar');
Route::get('/importar', 'ImportarController@listar');
Route::get('/exportar', 'ExportarController@listar');


