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

Route::resource('t_usuario','UsuarioController');

Route::get('/', function () {
    return view('Acceso');
});

Route::get('/Perfil', function () {
    return view('Perfil');
});

Route::get('/Principal', function(){
    return view('Principal');
});
Auth::routes();

