<?php

// Estas rutas son para el acceso al sistema

// Este recibe los datos del login

// Vista de Acceso
Route::get('/', 'Auth\LoginController@index', ['middleware' => 'auth', function () {
}])->name('acceso');

// // Por medio del post, recolecta los datos y los envia al servidor, en este caso, al metodo login del controlador LoginController
Route::post('/', 'Auth\LoginController@login', ['middleware' => 'auth', function () {
}])->name('login');

// Para salir de una sesion ya iniciada, se accede a esta ruta
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Almacena codigo fuente de Laravel para la generacion de excepciones
Auth::routes();

// Este grupo de rutas, evita que se accedan a otros rutas sin antes logearse, de lo contrario redirecciona a la pagina de acceso
Route::middleware(['auth'])->group(function () {

    // Vista principal
    Route::get('/Principal', 'UsuarioController@principal')->name('Principal');

    // Crud para la vista de Perfil
    Route::get('/Perfil', 'PerfilController@index')->name('Perfil');
    Route::put('/Perfil/Actualizar/{id_usuario}', 'PerfilController@update')->name('actualizar');
    Route::put('/Perfil/Correo/{id_usuario}', 'PerfilController@update_correo')->name('actualizar_correo');
    Route::put('/Perfil/Usuario/{id_usuario}', 'PerfilController@update_usuario')->name('actualizar_usuario');
    Route::delete('/Perfil/Eliminar/{id_usuario}', 'PerfilController@delete_asistente')->name('eliminar_asistente');

    Route::middleware(['admin'])->group(function () {
        // Crud para la vista Productos
        Route::get('/Productos', 'ProductoController@index')->name('Productos');
        Route::post('/Productos', 'ProductoController@store')->name('AgregarProducto');
        Route::put('/Productos/{id_producto}', 'ProductoController@update')->name('ActualizarProducto');
        Route::delete('/Productos/{id_producto}', 'ProductoController@destroy')->name('EliminarProducto');

        // Crud para la vista ManoObra
        Route::get('/ManoObra', 'ManoObraController@index')->name('ManoObra');
        Route::post('/Total', 'ManoObraController@store')->name('total');
        Route::put('/Labores/{id_labor}', 'ManoObraController@labor')->name('ActualizarLabores');
        Route::put('/Actualizar/{id_mano_de_obra}', 'ManoObraController@update')->name('ActualizarManoDeObra');
        Route::delete('/Eliminar/{id_mano_de_obra}', 'ManoObraController@delete')->name('EliminarManoDeObra');

        // Crud para la vista de Asistentes
        Route::get('/Asistentes', 'AsistenteController@index')->name('Asistentes');
        Route::post('/Asistentes', 'AsistenteController@store')->name('AgregarAsistente');
        Route::put('/Asistentes{id_usuario}', 'AsistenteController@update')->name('ActualizarAsistente');
        Route::delete('/Asistentes/{id_usuario}', 'AsistenteController@destroy')->name('EliminarAsistente');


        // Crud para la vista Equipo ----------------------------------
        Route::get('/Equipo', 'EquiposController@index')->name('Equipo');
        Route::post('/Equipo', 'EquiposController@store')->name('AgregarEquipo');
        Route::put('/Actualizando/{id_equipo}/Equipo', 'EquiposController@update')->name('ActualizarEquipo');
        Route::put('/Actualizando/{id_equipo}', 'CostoUnitarioController@costo')->name('CostoEquipo');
        Route::delete('/Equipo/{id_equipo}', 'EquiposController@destroy')->name('EliminarEquipo');

        // Crud para la vista Viaticos
        Route::get('/Viaticos', 'ViaticosController@index')->name('Viaticos');
        Route::post('/Viaticos', 'ViaticosController@store')->name('AgregarViaticos');
        Route::put('/Viaticos/{id_viatico}', 'ViaticosController@update')->name('ActualizarViaticos');
        Route::delete('/Viaticos/{id_viatico}', 'ViaticosController@destroy')->name('EliminarViaticos');

        // Crud para la vista Materia prima
        Route::get('/MateriaPrima', 'MateriaPrimaController@index')->name('materia');
        Route::post('/MateriaPrima', 'MateriaPrimaController@store')->name('AgregarMateriaPrima');
        Route::put('/MateriaPrima/{id_materia_prima}', 'MateriaPrimaController@update')->name('ActualizarMateriaPrima');
        Route::put('/MateriaPrima/{id_materia_prima}/calculando', 'MateriaPrimaController@edit')->name('EditarMateriaPrima');
        Route::delete('/MateriaPrima/{id_materia_prima}', 'MateriaPrimaController@destroy')->name('EliminarMateriaPrima');
    });
    
    // Vista Costo Unitario
    Route::get('/Pedidos', 'PedidosController@index')->name('Pedidos');

    // Vista Reportes
    Route::get('/Reportes', 'ReportesController@index')->name('Reportes');
    //Descargable
    Route::get('/Reportes/Descarga/{id_producto}', 'ReportesController@pdf')->name('Reportes.pdf');

    // Crud para la vista principal CIF
    Route::get('/CIF', 'CifController@index')->name('CIF');
    Route::post('Agregando/CIF', 'CifController@store')->name('AgregarCIF');
    Route::put('Actualizando/CIF/{id_cif}', 'CifController@update')->name('ActualizarNombre');
    Route::delete('/Eliminando/{id_cif}', 'CifController@destroy')->name('EliminarCIF');

    // Crud para la vista de cada mes para un CIF
    Route::get('/mes/{id_cif}', 'MesController@index')->name('IndexCIF');
    Route::post('/mes/{id_cif}/valores', 'MesController@valores')->name('AgregarValores');
    Route::post('/{id_cif}/agregar/Mes', 'MesController@store')->name('AgregarMes');
    Route::put('/mes/{id_cif}/{id_mes}/Actualizar', 'MesController@mes')->name('ActualizarMes');
    Route::put('/mes/{id_cif}/Valores/Actualizar', 'MesController@update')->name('ActualizarValores');
    Route::delete('/mes/{id_cif}/{id_mes}/Eliminar', 'MesController@destroy')->name('EliminarMes');

    //Crud para Costo Unitario
    Route::get('/CostoUnitario/{id_producto}', 'CostoUnitarioController@index')->name('IndexCU');
    Route::post('/CostoUnitario/{id_producto}/guardando', 'CostoUnitarioController@store')->name('StoreCU');
    Route::post('/CostoUnitario{id_producto}/guardando/operario', 'CostoUnitarioController@operario')->name('AgregarOperario');
    Route::post('CostoUnitario{id_producto}/guardando/equipo', 'CostoUnitarioController@equipo')->name('IngresarEquipo');
    Route::post('/CostoUnitario/PrecioVenta/{id_producto}/Ver', 'CostoUnitarioController@precio')->name('PrecioVenta');
    Route::put('/CostoUnitario/Actualizar/{id_labor}/calculando', 'CostoUnitarioController@total')->name('ActualizarTotal');

    //Vista precio de venta
    Route::get('PrecioVenta/{id_producto}', 'PrecioVentaController@index')->name('IndexPV');
    Route::put('PrecioVenta/{id_producto}', 'PrecioVentaController@update')->name('AgregarCantidad');
    Route::post('PrecioVenta/{id_producto}/Total', 'PrecioVentaController@store')->name('CostoTotalPV');
});
