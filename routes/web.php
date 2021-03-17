<?php

// Estas rutas son para el acceso al sistema

// Este recibe los datos del login
Route::get('/', 'Auth\LoginController@index')->name('login');
// // Por medio del post, recolecta los datos y los envia al servidor, en este caso, al metodo login del controlador LoginController
Route::post('/', 'Auth\LoginController@login')->name('login');
// Para salir de una sesion ya iniciada, se accede a esta ruta
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Almacena codigo fuente de Laravel para la generacion de excepciones
Auth::routes();



// Este grupo de rutas, evita que se accedan a otros rutas sin antes logearse, de lo contrario redirecciona a la pagina de acceso
Route::middleware(['auth'])->group(function () {

    //Pruebas para el correo
    Route::post('/Principal', 'UsuarioController@contact')->name('contact');

    // Crud para la vista principal
    Route::get('/Principal', 'UsuarioController@principal');
    Route::get('/home', function () {
        return view('home');
    });

    // Crud para la vista ManoObra
    Route::get('/ManoObra', 'ManoObraController@index');
    Route::post('/Total', 'ManoObraController@store')->name('total');
    Route::put('/Labores/{id_labor}', 'ManoObraController@labor')->name('ActualizarLabores');
    Route::put('/Actualizar/{id_mano_de_obra}', 'ManoObraController@update')->name('ActualizarManoDeObra');
    Route::delete('/Eliminar/{id_mano_de_obra}', 'ManoObraController@delete')->name('EliminarManoDeObra');

    // Crud para la vista Productos
    Route::get('/Productos', 'ProductoController@index');
    Route::post('/Productos', 'ProductoController@store')->name('AgregarProducto');
    Route::put('/Productos/{id_producto}', 'ProductoController@update')->name('ActualizarProducto');
    Route::delete('/Productos/{id_producto}', 'ProductoController@destroy')->name('EliminarProducto');

    // Crud para la vista de Perfil
    Route::get('/Perfil', 'PerfilController@index')->name('Perfil');
    Route::post('/Perfil', 'PerfilController@store')->name('store');
    Route::put('/Update/{id_usuario}', 'PerfilController@update')->name('actualizar');
    Route::put('/Correo/{id_usuario}', 'PerfilController@update_correo')->name('actualizar_correo');
    Route::delete('/Eliminar/{id_usuario}', 'PerfilController@delete_asistente')->name('eliminar_asistente');

    Route::get('/Asistentes', 'AsistenteController@index');
    Route::post('/Asistentes', 'AsistenteController@store')->name('AgregarAsistente');
    Route::put('/Asistentes', 'AsistenteController@update')->name('ActualizarAsistente');
    Route::delete('/Asistentes/{id_usuario}', 'AsistenteController@destroy')->name('EliminarAsistente');


    // Crud para la vista Equipo ----------------------------------
    Route::get('/Equipo', 'EquiposController@index');
    Route::post('/Equipo', 'EquiposController@store')->name('AgregarEquipo');
    Route::put('/Actualizando/{id_equipo}', 'EquiposController@update')->name('ActualizarEquipo');
    Route::delete('/Equipo/{id_equipo}', 'EquiposController@destroy')->name('EliminarEquipo');


    // Crud para la vista CIF
    Route::get('/CIF', 'CifController@index');
    Route::post('/CIF', 'CifController@store')->name('AgregarCIF');
    Route::put('/CIF/{id_cif}', 'CifController@update')->name('ActualizarCIF');
    Route::delete('/Eliminando/{id_cif}', 'CifController@destroy')->name('EliminarCIF');


    // Crud para la vista Viaticos
    Route::get('/Viaticos', 'ViaticosController@index');
    Route::post('/Viaticos', 'ViaticosController@store')->name('AgregarViaticos');
    Route::put('/Viaticos/{id_viatico}', 'ViaticosController@update')->name('ActualizarViaticos');
    Route::delete('/Viaticos/{id_viatico}', 'ViaticosController@destroy')->name('EliminarViaticos');

    // Crud para la vista Materia prima
    Route::get('/MateriaPrima', 'MateriaPrimaController@index');
    Route::post('/MateriaPrima', 'MateriaPrimaController@store')->name('AgregarMateriaPrima');
    Route::put('/MateriaPrima/{id_materia_prima}', 'MateriaPrimaController@update')->name('ActualizarMateriaPrima');
    Route::delete('/MateriaPrima/{id_materia_prima}', 'MateriaPrimaController@destroy')->name('EliminarMateriaPrima');


    // Crud para la vista Recetario
    Route::get('/Recetario', 'RecetarioController@index');
    Route::post('/Recetario', 'RecetarioController@store')->name('AgregarRecetario');
    Route::put('/Recetario/{id_recetario}', 'RecetarioController@update')->name('ActualizarRecetario');
    Route::delete('/Recetario/{id_recetario}', 'RecetarioController@destroy')->name('EliminarRecetario');

    // Crud para la vista Pedidos
    Route::get('/Pedidos', 'PedidosController@index');
    Route::post('/Pedidos', 'PedidosController@store')->name('AgregarPedidos');
    Route::put('/Pedidos/{id_Pedido}', 'PedidosController@update')->name('ActualizarPedidos');
    Route::delete('/Pedidos/{id_Pedido}', 'PedidosController@destroy')->name('EliminarPedidos');

    // Crud para la vista Reportes
    Route::get('/Reportes', 'ReportesController@index');
    Route::post('/Reportes', 'ReportesController@store')->name('AgregarReportes');
    Route::put('/Reportes/{id_reporte}', 'ReportesController@update')->name('ActualizarReportes');
    Route::delete('/Reportes/{id_reporte}', 'ReportesController@destroy')->name('EliminarReportes');
});
