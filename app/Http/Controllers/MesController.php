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
    public function index($id_cif)
    {
        date_default_timezone_set('America/Costa_Rica');
        setlocale(LC_ALL, 'es_ES');
        $cif = t_cif::findOrFail($id_cif);
        $mes = DB::table('t_mes')->get();
        // $valor = DB::table('t_valores')->get();

        return view('modulos/DetalleCIF', compact('cif'), ['t_mes' => $mes]);
    }

    public function create()
    {
    }

    public function store(Request $request, $id_cif)
    {
        $suma = 0;
        $cantidad = 0;
        $promedio = 0;

        $edit = new t_mes();
        $mes = DB::table('t_mes')->get();
        $cif = t_cif::findOrFail($id_cif);

        $edit->fecha = $request->fecha;
        $edit->recibo_pagar = $request->recibo_pagar;
        $edit->id_cif = $cif->id_cif;
        $edit->save();

        $valor = new t_valores();
        $valores = DB::table('t_valores')->get();

        $calculo = DB::table('t_mes')->get();
        foreach ($calculo as $item) {
            if ($cif->id_cif == $item->id_cif) {
                if ($item->recibo_pagar >= 0) {
                    $cantidad++;
                }
                $suma = ($item->recibo_pagar + $suma);
                $promedio = ($suma) / $cantidad;
            }
        }

        foreach ($valores as $item) {
            if ($cif->id_cif == $item->id_cif) {
                $valor = t_valores::findOrFail($id_cif);
                $valor->porcentaje_utilizacion = $item->porcentaje_utilizacion;
                $valor->consumo_empresa = ($item->porcentaje_utilizacion * $promedio) / 100;
                $valor->porcentaje_produccion = $item->porcentaje_produccion;

                $valor->produccion_mensual = $item->produccion_mensual;
                $valor->id_cif = $cif->id_cif;
                $valor->promedio = $promedio;
                $valor->total = ($valor->consumo_produccion / $valor->produccion_mensual);
            }
        }
        // Insertar en la base de datos
        $valor->save();

        $consumo = DB::table('t_valores')->get();
        foreach ($consumo as $item) {
            if ($cif->id_cif == $item->id_cif) {
                $calculo = t_valores::findOrFail($id_cif);
                $calculo->consumo_produccion = ($item->consumo_empresa * $item->porcentaje_produccion)/100;
            }
        }
        // Insertar en la base de datos
        $calculo->save();
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
        $edit->promedio = $promedio;
        $edit->total = $edit->consumo_produccion * $edit->produccion_mensual;
        $edit->id_cif = $cif->id_cif;
        // Insertar en la base de datos
        $edit->save();
        // Redirigir a la vista original 
        return back()->with('agregar', 'El usuario se ha agregado');
    }

    public function show($id)
    {
        //
    }

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

    public function update(Request $request, $id_cif)
    {
    }

    public function destroy(Request $request, $id_cif, $id_mes)
    {
        $suma = 0;
        $cantidad = 0;
        $promedio = 0;

        $eliminar = t_mes::findOrFail($id_mes);
        $eliminar->delete();

        $calculo = DB::table('t_mes')->get();
        foreach ($calculo as $item) {
            if ($id_cif == $item->id_cif) {
                if ($item->recibo_pagar >= 0) {
                    $cantidad++;
                }
                $suma = ($item->recibo_pagar + $suma);
                $promedio = ($suma) / $cantidad;
            }
        }
        $valores = DB::table('t_valores')->get();
        foreach ($valores as $item) {
            if ($id_cif == $item->id_cif) {
                $valor = t_valores::findOrFail($id_cif);
                $valor->porcentaje_utilizacion = $item->porcentaje_utilizacion;
                $valor->consumo_empresa = ($item->porcentaje_utilizacion * $promedio) / 100;
                $valor->porcentaje_produccion = $item->porcentaje_produccion;
                $valor->consumo_produccion = ($item->consumo_empresa * $item->porcentaje_produccion);
                $valor->produccion_mensual = $item->produccion_mensual;
                $valor->id_cif = $id_cif;
                $valor->promedio = $promedio;
                $valor->total = ($valor->consumo_produccion) / $valor->produccion_mensual;
            }
        }
        // Insertar en la base de datos
        $valor->save();

        return back()->with('eliminar', 'fue eliminado exitosamente');
    }
}
