<?php

namespace App\Http\Controllers;

use App\t_materia_prima;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MateriaPrimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $materia = DB::table('t_materia_prima')->get();
        $producto = DB::table('t_producto')->get();
        return view('modulos/MateriaPrima', ['t_materia_prima' => $materia, 't_producto' => $producto]);
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
        // return $request->all();
        $agregar = new t_materia_prima();
        $agregar->producto = $request->producto;
        $agregar->unidad_medida = $request->unidad_medida;
        $agregar->presentacion = $request->presentacion;
        $agregar->cantidad = 0;
        $agregar->costo = $request->costo;
        $agregar->precio_um =  ($request->costo/$request->presentacion);
        $agregar->id_producto = $request->id_producto;

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
        //
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
    public function update(Request $request, $id_materia_prima)
    {
        $edit = t_materia_prima::findOrFail($id_materia_prima);
        $edit->producto = $request->producto;
        $edit->unidad_medida = $request->unidad_medida;
        $edit->presentacion = $request->presentacion;
        $edit->cantidad = $request->cantidad;
        $edit->costo = $request->costo;
        $edit->precio_um = ($request->costo/$request->presentacion);
        // Insertar en la base de datos
        $edit->save();
        // Redirigir a la vista original 
        return back()->with('edit', 'se agrego sin problemas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_materia_prima)
    {
        $eliminar = t_materia_prima::findOrFail($id_materia_prima);
        $eliminar->delete();
        return back()->with('eliminar', 'fue eliminado exitosamente');
    }
}
