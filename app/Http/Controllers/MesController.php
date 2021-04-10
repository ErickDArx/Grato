<?php

namespace App\Http\Controllers;

use App\t_cif;
use App\t_mes;
use App\t_valores;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_cif)
    {
        date_default_timezone_set('America/Costa_Rica');
        setlocale(LC_ALL, 'es_ES');
        $cif = t_cif::findOrFail($id_cif);
        $mes = DB::table('t_mes')->get();
        // $valor = DB::table('t_valores')->get();

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
        $mes = DB::table('t_mes')->get();
        $cif = t_cif::findOrFail($id_cif);

        $suma = 0;
        $cantidad = 0;
        $promedio = 0;

        foreach ($mes as $item) {
            if ($cif->id_cif == $item->id_cif) {
                if ($item->recibo_pagar >= 0) {
                    $cantidad++;
                }
                $suma = ($item->recibo_pagar + $suma);
                $promedio = ($suma) / $cantidad;
            }
        }

        $edit->fecha = $request->fecha;
        $edit->recibo_pagar = $request->recibo_pagar;
        $edit->promedio = $promedio;
        $edit->total = 1;
        // $edit->porcentaje_utilizacion = $request->porcentaje_utilizacion;
        // $edit->consumo_empresa = ($edit->porcentaje_utilizacion * $promedio) / 100;
        // $edit->porcentaje_produccion = $request->porcentaje_produccion;
        // $edit->consumo_produccion = ($edit->consumo_empresa * $edit->porcentaje_produccion) / 100;
        // $edit->produccion_mensual = $request->produccion_mensual;
        $edit->id_cif = $cif->id_cif;

        $valor = new t_valores();
        $valores = DB::table('t_valores')->get();
        foreach ($valores as $item) {
            if ($cif->id_cif == $item->id_cif) {
                $valor = t_valores::findOrFail($id_cif);
                $valor->porcentaje_utilizacion = $item->porcentaje_utilizacion;
                $valor->consumo_empresa = $item->porcentaje_utilizacion * $promedio / 100;
                $valor->porcentaje_produccion = $item->porcentaje_produccion;
                $valor->consumo_produccion = $item->consumo_empresa * $item->porcentaje_produccion / 100;
                $valor->produccion_mensual = $item->produccion_mensual;
                $valor->id_cif = $cif->id_cif;
            }
        }

        // Insertar en la base de datos
        $edit->save();
        $valor->save();
        // Redirigir a la vista original 
        return back()->with('agregar', 'El usuario se ha agregado');
    }

    public function valores(Request $request, $id_cif)
    {

        $edit = new t_valores();
        $mes = DB::table('t_mes')->get();
        $cif = t_cif::findOrFail($id_cif);

        $suma = 0;
        $cantidad = 0;
        $promedio = 0;

        foreach ($mes as $item) {
            if ($cif->id_cif == $item->id_cif) {
                if ($item->recibo_pagar >= 0) {
                    $cantidad++;
                }
                $suma = ($item->recibo_pagar + $suma);
                $promedio = ($suma) / $cantidad;
            }
        }

        $edit->porcentaje_utilizacion = $request->porcentaje_utilizacion;
        $edit->consumo_empresa = ($edit->porcentaje_utilizacion * $promedio) / 100;
        $edit->porcentaje_produccion = $request->porcentaje_produccion;
        $edit->consumo_produccion = ($edit->consumo_empresa * $edit->porcentaje_produccion) / 100;
        $edit->produccion_mensual = $request->produccion_mensual;
        $edit->id_cif = $cif->id_cif;

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
        date_default_timezone_set('America/Costa_Rica');
        setlocale(LC_ALL, 'es_ES');
        $cif = t_cif::findOrFail($id_cif);
        // $valor = t_valores::findOrFail($id_cif);
        $mes = DB::table('t_mes')->get();
        // $valor = DB::table('t_valores')->get();

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
        $edit->total = $request->tiempo_uso * 20.59;
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
    public function destroy($id_mes)
    {
        $eliminar = t_mes::findOrFail($id_mes);
        $eliminar->delete();
        return back()->with('eliminar', 'fue eliminado exitosamente');
    }
}
