<?php

namespace App\Http\Controllers;
use App\t_cif;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CifController extends Controller
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
        $cif = DB::table('t_cif')->get();
        return view('modulos\CIF' , ['t_cif' => $cif]);
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
        $agregar = new t_cif();
        $agregar->nombre_cif = $request->nombre_cif;
        $agregar->recibo_pagar = $request->recibo_pagar;
        $agregar->porcentaje_utilizacion = $request->porcentaje_utilizacion;
        $agregar->porcentaje_produccion = $request->porcentaje_produccion;
        $agregar->produccion_mensual = $request->produccion_mensual;
        $agregar->fecha = Carbon::now();
        $agregar->total = $request-> tiempo_uso * 20.59;
        // Insertar en la base de datos
        $agregar->save();
        // Redirigir a la vista original 
        return back()->with('agregar', 'El usuario se ha agregado');
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
    public function update(Request $request, $id_cif)
    {
        $edit = t_cif::findOrFail($id_cif);
        $edit->nombre_cif = $request->nombre_cif;
        $edit->recibo_pagar = $request->recibo_pagar;
        $edit->porcentaje_utilizacion = $request->porcentaje_utilizacion;
        $edit->porcentaje_produccion = $request->porcentaje_produccion;
        $edit->produccion_mensual = $request->produccion_mensual;
        $edit->fecha = Carbon::now();
        $edit->total = 20.59;
        // Insertar en la base de datos
        $edit->save();
        // Redirigir a la vista original 
        return back()->with('edit', 'Todo salio bien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cif)
    {
        $eliminar = t_cif::findOrFail($id_cif);
        $eliminar->delete();
        return back()->with('eliminar', 'fue eliminado exitosamente');
    }
}
