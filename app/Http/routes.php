<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/








// Rotas de Autenticação
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Rotas de Cadastro
Route::get('cadastro', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');



Route::get('/', function () {
    if(!Auth::check())
        return redirect('login');

    return redirect('usuario');
});



Route::group(['prefix' => 'usuario', 'middleware' => 'auth'], function () {

	Route::get('/',['as'=>'index', 'uses'=>'UserController@index']);

	Route::get('despesas', ['as'=>'despesas', 'uses'=>'UserController@expenses']);
	    //return view('carteira.despesa');

	Route::get('receitas', ['as'=>'receitas', 'uses'=>'UserController@recipes']);
	    //return view('carteira.receita');


	Route::get('contato',['as'=>'contato', 'uses'=>'UserController@contacts']);
	    //return view('carteira.contato');

	Route::get('conta', ['as'=>'conta', 'uses'=>'UserController@accounts']);
	    //return view('carteira.conta');

});











