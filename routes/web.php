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

Auth::routes(); 
// Esta función crea las rutas Login y Registrer. Vienen predeterminadas en Laravel
Route::get('/login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('/login/google/callback', 'Auth\LoginController@receiveDataGoogle');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtos/cadastrar', 'ProductController@viewForm')->middleware('checkuser');
Route::post('/produtos/cadastrar', 'ProductController@create');

Route::get('/produtos/atualizar/{id?}', 'ProductController@viewFormUpdate');
Route::post('/produtos/atualizar', 'ProductController@update');

Route::get('/produtos', 'ProductController@viewAllProducts');
Route::get('produtos/deletar/{id?}', 'ProductController@delete');