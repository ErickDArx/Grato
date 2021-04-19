<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t_producto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{

    public function index(Request $request)
    {

        $busqueda = $request->get('busqueda');
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $materia = t_producto::orderBy('nombre_producto','ASC')
        ->busqueda($busqueda)
        ->paginate(6);

        return view('modulos/Productos', ['t_producto' => $materia]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre_producto' => 'required|string|min:3|unique:t_producto,nombre_producto',
        ],[
            'nombre_producto.required'=> 'El campo: Nombre del producto, no puede quedar vacio',
            'nombre_producto.min'=> 'El campo: Nombre del producto, debe tener minimo 3 caracteres',
            'nombre_producto.unique'=> 'El valor del campo: Nombre del producto, ya existe',
        ]);
        $agregar = new t_producto();
        $agregar->nombre_producto = $request->nombre_producto;
        
        // Insertar en la base de datos
        $agregar->save();
        // Redirigir a la vista original 
        return back()->with('agregar', 'se agrego sin problemas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_producto)
    {
        request()->validate([
            'nombre' => 'required|string|min:3|unique:t_producto,nombre_producto',
        ],[
            'nombre.required'=> 'El campo: Nombre del producto, no puede quedar vacio',
            'nombre.min'=> 'El campo: Nombre del producto, debe tener minimo 3 caracteres',
            'nombre.unique'=> 'El valor del campo: Nombre del producto, ya existe',
        ]);
        $edit = t_producto::findOrFail($id_producto);
        $edit->nombre_producto = $request->nombre;
        $edit->save();
        return back()->with('edit','Todo salio bien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_producto)
    {
        $eliminar = t_producto::findOrFail($id_producto);
        $eliminar -> delete();
        return back()->with('eliminar','fue eliminado exitosamente');
    }
}
