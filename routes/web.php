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

// Route::get('/','UsuarioController@getLogin')->name('login');
// Route::post('/','UsuarioController@getLogin')->name('login');
// Route::get('/Perfil', function () {
//     return view('Perfil');
// });


Route::get('/',function(){
return view('Acceso');
});

Route::get('/ManoObra', function () {
    return view('ManoObra');
});

Route::get('/Principal', function(){
    return view('Principal');
});

Route::get('/Perfil', 'PerfilController@index')->name('Perfil');
Route::post('/Perfil', 'PerfilController@store')->name('store');


Route::get('/CIF', function(){
    return view('CIF');
});

Route::get('/Viaticos', function(){
    return view('Viaticos');
});

Route::get('/Equipo', function(){
    return view('Equipo');
});

Route::get('/MateriaPrima', function(){
    return view('MateriaPrima');
});

Route::get('/Recetario', function(){
    return view('Recetario');
});

Route::get('/Pedidos', function(){
    return view('Pedidos');
});
Route::get('/Reportes', function(){
    return view('Reportes');
});

Route::get('/Asistentes', function(){
    $users = DB::table('users')->get();

    return view('Asistentes', ['users' => $users]);

});


Auth::routes();

