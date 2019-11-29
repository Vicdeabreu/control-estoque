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
    return view('welcome');
});

Route::get('/formulario', 'HomeController@exibirFormulario');

Route::post('/formulario', 'HomeController@cadastrarFormulario');

Route::get('/request/id/{id?}', 'HomeController@request'); // Paso el id como parámetro entre mostacho

Route::get('/home', 'HomeController@viewHome');

Route::get('/cidades', 'CidadeController@viewCidades');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtos/cadastrar', 'ProductController@viewForm');
Route::post('/produtos/cadastrar', 'ProductController@create');
