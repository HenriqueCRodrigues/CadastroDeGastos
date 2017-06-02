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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/despesas', function () {
    return view('carteira.despesa');
});
Route::get('/receitas', function () {
    return view('carteira.receita');
});
Route::get('/cadastro', function () {
    return view('user.register');
});
Route::get('/login', function () {
    return view('user.login');
});
Route::get('/contato', function () {
    return view('carteira.contato');
});
Route::get('/conta', function () {
    return view('carteira.conta');
});
