<?php

namespace App\Http\Controllers;

use App\t_materia_prima;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MateriaPrimaController extends Controller
{

    public function index(Request $request)
    {
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');

        $busqueda = $request->get('busqueda');
        $materia = t_materia_prima::orderBy('id_materia_prima', 'DESC')
            ->busqueda($busqueda)
            ->paginate(4);
        $producto = DB::table('t_producto')->get();
        return view('modulos/MateriaPrima', ['t_materia_prima' => $materia, 't_producto' => $producto]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $agregar = new t_materia_prima();
        $agregar->producto = $request->producto;
        $agregar->unidad_medida = $request->unidad_medida;
        $agregar->presentacion = $request->presentacion;
        $agregar->costo = $request->costo;
        $agregar->precio_um =  ($request->costo / $request->presentacion);
        $agregar->id_producto = $request->id_producto;
        // Insertar en la base de datos
        $agregar->save();
        // Redirigir a la vista original 
        return back()->with('agregar', 'se agrego sin problemas');
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request, $id_materia_prima)
    {
        $edit = t_materia_prima::findOrFail($id_materia_prima);
        $edit->cantidad = $request->cantidad;
        $edit->precio_um = ($edit->costo / $edit->presentacion);
        $edit->precio = $request->cantidad * $edit->precio_um;
        // Insertar en la base de datos
        $edit->save();
        // Redirigir a la vista original 
        return back()->with('edit', 'se agrego sin problemas');
    }

    public function update(Request $request, $id_materia_prima)
    {
        $edit = t_materia_prima::findOrFail($id_materia_prima);
        $edit->producto = $request->producto;
        $edit->unidad_medida = $request->unidad_medida;
        $edit->presentacion = $request->presentacion;
        $edit->cantidad = $request->cantidad;
        $edit->costo = $request->costo;
        $edit->precio_um = ($request->costo / $request->presentacion);
        $edit->precio = $request->cantidad * $edit->precio_um;


        // Insertar en la base de datos
        $edit->save();
        // Redirigir a la vista original 
        return back()->with('edit', 'se agrego sin problemas');
    }

    public function destroy($id_materia_prima)
    {
        $eliminar = t_materia_prima::findOrFail($id_materia_prima);
        $eliminar->delete();
        return back()->with('eliminar', 'fue eliminado exitosamente');
    }
}
