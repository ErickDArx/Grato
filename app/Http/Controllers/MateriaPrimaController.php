<?php

namespace App\Http\Controllers;

use App\t_materia_prima;
use App\t_totales;
use App\t_producto;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MateriaPrimaController extends Controller
{

    public function index(Request $request)
    {
        $busqueda = $request->get('busqueda');
        $materia = t_materia_prima::orderBy('id_materia_prima', 'DESC')
            ->busqueda($busqueda)
            ->paginate(4);
        $producto = DB::table('t_producto')->get();
        return view('modulos/MateriaPrima', ['t_materia_prima' => $materia, 't_producto' => $producto]);
    }

    public function edit(Request $request, $id_materia_prima)
    {
        $edit = t_materia_prima::findOrFail($id_materia_prima);
        $edit->cantidad = $request->cantidad;
        $edit->precio_um = ($edit->costo / $edit->presentacion);
        $edit->precio = $request->cantidad * $edit->precio_um;
        // Insertar en la base de datos
        $edit->save();

        $producto = t_producto::findOrFail($edit->id_producto);

        $sumaMP = 0.00;
        $materia = DB::table('t_materia_prima')->get();
        foreach ($materia as $item) {
            if ($item->id_producto == $producto->id_producto) {
                $sumaMP = $sumaMP + $item->precio;
            }
        }

        $campo = t_totales::where('id_producto', $item->id_producto)->first();

        if ($campo) {
            $total = t_totales::findOrFail($edit->id_producto);
            $total->id_producto = $edit->id_producto;
            $total->total_materia_prima = $sumaMP;
            $total->save();
        }


        // Redirigir a la vista original 
        return back()->with('edit', 'se agrego sin problemas');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        request()->validate([
            'producto' => 'required|string',
            'unidad_medida' => 'required',
            'presentacion' => 'required|numeric',
            'costo' => 'required|numeric',
        ], [
            'producto.required' => 'El campo: Nombre de la materia prima, no puede estar vacia',
            'costo.required' => 'El campo: Costo de la materia prima, no puede estar vacia',
            'presentacion.required' => 'El campo: Presentacion, no puede estar vacia',

        ]);
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

    public function update(Request $request, $id_materia_prima)
    {
        request()->validate([
            'producto' => 'required|string',
            'unidad_medida' => 'required',
            'presentacion' => 'required|numeric|min:1',
            'costo' => 'required|numeric',
        ], [
            'producto.required' => 'El campo: Nombre del insumo, no puede estar vacia',
            'costo.required' => 'El campo: Costo de la materia prima, no puede estar vacia',
            'presentacion.required' => 'El campo: Presentacion, no puede estar vacia',
        ]);

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
