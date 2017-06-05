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

    return redirect()->route('index');
});



Route::group(['prefix' => 'usuario', 'middleware' => 'auth'], function () {

		Route::get('/',['as'=>'index', 'uses'=>'UserController@index']);

		Route::group(['prefix'=>'contato'], function(){
			Route::get('/',['as' => 'index_contato', 'uses'=>'ContactController@index']);
			Route::post('salvar', ['as' => 'salvar_contato', 'uses' => 'ContactController@store']);
			Route::get('editar/{id}', ['as' => 'editar_contato', 'uses' => 'ContactController@edit']);
	    	Route::post('atualizar/{id}', ['as' => 'atualizar_contato', 'uses' => 'ContactController@update']);
			Route::get('remover/{id}', ['as' => 'remover_contato', 'uses' => 'ContactController@destroy']);

		});
	    
	    Route::group(['prefix'=>'conta'], function(){

	    	Route::get('/', ['as'=>'index_conta', 'uses'=>'AccountController@index']);
	    	Route::post('salvar', ['as' => 'salvar_conta', 'uses' => 'AccountController@store']);
	    	Route::get('editar/{id}', ['as' => 'editar_conta', 'uses' => 'AccountController@edit']);
	    	Route::post('atualizar/{id}', ['as' => 'atualizar_conta', 'uses' => 'AccountController@update']);
			Route::get('remover/{id}', ['as' => 'remover_conta', 'uses' => 'AccountController@destroy']);


	    });
		

		Route::group(['prefix'=>'receitas'], function(){

	    	Route::get('/', ['as'=>'index_receita', 'uses'=>'RecipeController@index']);
	    	Route::post('salvar', ['as' => 'salvar_receita', 'uses' => 'RecipeController@store']);
	    	Route::get('editar/{id}', ['as' => 'editar_receita', 'uses' => 'RecipeController@edit']);
	    	Route::post('atualizar/{id}', ['as' => 'atualizar_receita', 'uses' => 'RecipeController@update']);
			Route::get('remover/{id}', ['as' => 'remover_receita', 'uses' => 'RecipeController@destroy']);


	    });


	    Route::group(['prefix'=>'despesas'], function(){

	    	Route::get('/', ['as'=>'index_despesa', 'uses'=>'ExpenseController@index']);
	    	Route::post('salvar', ['as' => 'salvar_despesa', 'uses' => 'ExpenseController@store']);
	    	Route::get('editar/{id}', ['as' => 'editar_despesa', 'uses' => 'ExpenseController@edit']);
	    	Route::post('atualizar/{id}', ['as' => 'atualizar_despesa', 'uses' => 'ExpenseController@update']);
			Route::get('remover/{id}', ['as' => 'remover_despesa', 'uses' => 'ExpenseController@destroy']);


	    });
});











