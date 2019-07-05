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

//rotas restritas
Route::get('/', 'MainController@index')->middleware('auth');

Route::group(['middleware' => 'auth'], function() {
    //arquivo
	Route::post('/cadastrar', 'MailController@cadastrar');
	Route::post('/enviar', 'MailController@enviar');

	//registro
	Route::get('/registro', 'RegistroController@listar');
	Route::post('/registro/carregar', 'RegistroController@carregarArquivo');

	//tag
    Route::get('/tag','TagController@listar');
    Route::post('/tag/salvar/{id}', 'TagController@salvar');
    Route::get('/tag/editar/{id}','TagController@editar');
    Route::get('/tag/remover/{id}', 'TagController@remover');
    Route::get('/tag/confirmar/{id}', 'TagController@confirmar');

    //individuo
    Route::get('/individuo', 'IndividuoController@listar');
    Route::post('/individuo/salvar/{id}', 'IndividuoController@salvar');
    Route::get('/individuo/editar/{id}','IndividuoController@editar');
    Route::get('/individuo/remover/{id}', 'IndividuoController@remover');
    Route::get('/individuo/confirmar/{id}', 'IndividuoController@confirmar');
});


Auth::routes();
//rotas não restritas
Route::get('/home', 'MainController@index')->name('home');

//autenticação
Route::get('/logout', function() {
    Auth::logout();
    Session::flush();
    return Redirect::to('/login');
});
