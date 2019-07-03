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
