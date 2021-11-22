<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t_producto;
use Carbon\Carbon;

class ProductoController extends Controller
{

    //Funcion para la vista de Producto
    public function index(Request $request)
    {

        $busqueda = $request->get('busqueda');
        $materia = t_producto::orderBy('nombre_producto','ASC')
        ->busqueda($busqueda)
        ->paginate(6);

        return view('modulos/Productos', ['t_producto' => $materia]);
    }

    //Funcion para almacenar los productos en la base de datos
    public function store(Request $request)
    {
        //Generar las validaciones
        request()->validate([
            'nombre_producto' => 'required|string|min:3|unique:t_producto,nombre_producto',
        ],[
            'nombre_producto.required'=> 'El campo: Nombre del producto, no puede quedar vacio',
            'nombre_producto.min'=> 'El campo: Nombre del producto, debe tener minimo 3 caracteres',
            'nombre_producto.unique'=> 'El valor del campo: Nombre del producto, ya existe',
        ]);
        $agregar = new t_producto();
        $agregar->nombre_producto = $request->nombre_producto;
        $agregar->fecha = Carbon::now();
        // Insertar en la base de datos
        $agregar->save();
        // Redirigir a la vista original 
        return back()->with('agregar', 'se agrego sin problemas');
    }
    //Funcion para actualizar los producto
    public function update(Request $request, $id_producto)
    {
        request()->validate([
            'nombre' => 'required|string',
        ],[
            'nombre.required'=> 'El campo: Nombre del producto, no puede quedar vacio',
            'nombre.min'=> 'El campo: Nombre del producto, debe tener minimo 3 caracteres',
            'nombre.unique'=> 'El valor del campo: Nombre del producto, ya existe',
        ]);
        $edit = t_producto::findOrFail($id_producto);
        $edit->nombre_producto = $request->nombre;
        $edit->fecha = Carbon::now();
        $edit->save();
        return back()->with('edit','Todo salio bien');
    }
    //Funcion para eliminar los producto
    public function destroy($id_producto)
    {
        $eliminar = t_producto::findOrFail($id_producto);
        $eliminar -> delete();
        return back()->with('eliminar','fue eliminado exitosamente');
    }
}
