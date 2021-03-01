<?php

// Estas rutas son para el acceso al sistema

// Este recibe los datos del login
Route::get('/', 'Auth\LoginController@index')->name('login');
// Por medio del post, recolecta los datos y los envia al servidor, en este caso, al metodo login del controlador LoginController
Route::post('/login', 'Auth\LoginController@login')->name('login');
// Para salir de una sesion ya iniciada, se accede a esta ruta
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Almacena codigo fuente de Laravel para la generacion de excepciones
Auth::routes();

// Este grupo de rutas, evita que se accedan a otros rutas sin antes logearse, de lo contrario redirecciona a la pagina de acceso
Route::middleware(['auth'])->group(function () {

    Route::get('/ManoObra', function () {
        return view('ManoObra');
    });

    Route::get('/Principal', 'UsuarioController@principal');

    Route::get('/Perfil', 'PerfilController@index')->name('Perfil');
    Route::post('/Perfil', 'PerfilController@store')->name('store');

    Route::get('/CIF', function () {
        return view('CIF');
    });

    Route::get('/Viaticos', function () {
        return view('Viaticos');
    });

    Route::get('/Equipo', function () {
        return view('Equipo');
    });

    Route::get('/MateriaPrima', function () {
        return view('MateriaPrima');
    });

    Route::get('/Recetario', function () {
        return view('Recetario');
    });

    Route::get('/Pedidos', function () {
        return view('Pedidos');
    });
    Route::get('/Reportes', function () {
        return view('Reportes');
    });

    Route::get('/Asistentes', function () {
        $users = DB::table('t_usuario')->get();

        return view('Asistentes', ['t_usuario' => $users]);
    });

    Route::get('/home',function(){
        return view('home');
    });
    // Route::get('/Perfil/{id_usuario}', 'PerfilController@editar')->name('editar');

    Route::put('/Update/{id_usuario}', 'PerfilController@update')->name('actualizar');

    Route::put('/Correo/{id_usuario}', 'PerfilController@update_correo')->name('actualizar_correo');

    Route::delete('/Eliminar/{id_usuario}', 'PerfilController@delete_asistente')->name('eliminar_asistente');
});
