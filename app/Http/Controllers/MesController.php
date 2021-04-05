<?php

namespace App\Http\Controllers;

use App\t_cif;
use App\t_mes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class MesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_cif)
    {
        $id = Crypt::decrypt($id_cif);
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $cif = t_cif::findOrFail($id);
        $mes = DB::table('t_mes')->get();
        return view('modulos/DetalleCIF', compact('cif'), ['t_mes' => $mes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_cif)
    {
        $edit = new t_mes();
        $cif = t_cif::findOrFail($id_cif);
        $edit->nombre_mes = $request->nombre_mes;
        $edit->recibo_pagar = $request->recibo_pagar;
        $edit->porcentaje_utilizacion = $request->porcentaje_utilizacion;
        $edit->porcentaje_produccion = $request->porcentaje_produccion;
        $edit->produccion_mensual = $request->produccion_mensual;
        $edit->fecha = Carbon::now();
        $edit->id_cif = $cif->id_cif;
        $edit->total = 20.00;
        // Insertar en la base de datos
        $edit->save();
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
    public function edit($id_cif)
    {
        $id = Crypt::decrypt($id_cif);
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $cif = t_cif::findOrFail($id);
        $mes = DB::table('t_mes')->get();
        return view('modulos/DetalleCIF', compact('cif'), ['t_mes' => $mes]);
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
        $edit->total = $request-> tiempo_uso * 20.59;
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
    public function destroy($id)
    {
        //
    }
}
