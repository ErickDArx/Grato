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

    // Crud para la vista principal
    Route::get('/Principal', 'UsuarioController@principal');
    
    // Crud para la vista ManoObra
    Route::get('/ManoObra', 'ManoObraController@index');
    Route::post('/Total', 'ManoObraController@store')->name('total');
    Route::delete('/Eliminar/{id_mano_de_obra}', 'ManoObraController@delete')->name('eliminar_operario');


    // Crud para la vista de Perfil
    Route::get('/Perfil', 'PerfilController@index')->name('Perfil');
    Route::post('/Perfil', 'PerfilController@store')->name('store');
    Route::put('/Update/{id_usuario}', 'PerfilController@update')->name('actualizar');
    Route::put('/Correo/{id_usuario}', 'PerfilController@update_correo')->name('actualizar_correo');
    Route::delete('/Eliminar/{id_usuario}', 'PerfilController@delete_asistente')->name('eliminar_asistente');
    Route::get('/Asistentes', function () {
        $users = DB::table('t_usuario')->get();

        return view('Asistentes', ['t_usuario' => $users]);
    });

    // Crud para la vista Equipo ----------------------------------
    Route::get('/Equipo', 'EquiposController@index');
    Route::post('/Agregando', 'EquiposController@store')->name('AgregarEquipo');
    Route::put('/Actualizando/{id_equipo}', 'EquiposController@update')->name('ActualizarEquipo');
    Route::delete('/Eliminando/{id_equipo}', 'EquiposController@destroy')->name('EliminarEquipo');


    // Crud para la vista CIF
    Route::get('/CIF', 'CifController@index');
    Route::post('/Agregando', 'CifController@index')->name('AgregarCIF');
    Route::put('/Actualizando', 'CifController@index')->name('ActualizarCIF');
    Route::delete('/Eliminando', 'CifController@index')->name('EliminarCIF');


    // Crud para la vista Viaticos
    Route::get('/Viaticos', function () {
        return view('Viaticos');
    });

    // Crud para la vista Materia prima
    Route::get('/MateriaPrima', function () {
        return view('MateriaPrima');
    });

    // Crud para la vista Recetario
    Route::get('/Recetario', function () {
        return view('Recetario');
    });
    
    // Crud para la vista Pedidos
    Route::get('/Pedidos', function () {
        return view('Pedidos');
    });

    // Crud para la vista Reportes
    Route::get('/Reportes', function () {
        return view('Reportes');
    });


});
