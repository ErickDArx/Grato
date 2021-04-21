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

        $cif = t_cif::findOrFail(decrypt($id_cif));

        $mes = t_mes::orderBy('fecha', 'ASC')
            ->paginate(4);
        $valores = DB::table('t_valores')->get();
        $meses = DB::table('t_mes')->get();

        return view('modulos/DetalleCIF', compact('cif'), ['t_mes' => $meses, 't_valores' => $valores]);
    }

    // Agregar los valores porcentuales
    public function valores(Request $request, $id_cif)
    {
        $suma = 0;
        $cantidad = 0;
        $promedio = 0;

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

        $campo = t_valores::where('id_cif', $id_cif)->first();

        if (!$campo) {
            $insertar = new t_valores();
            $insertar->porcentaje_utilizacion = $request->porcentaje_utilizacion;
            $insertar->consumo_empresa = ($insertar->porcentaje_utilizacion * $promedio) / 100;
            $insertar->porcentaje_produccion = $request->porcentaje_produccion;
            $insertar->consumo_produccion = ($insertar->consumo_empresa * $insertar->porcentaje_produccion) / 100;
            $insertar->produccion_mensual = $request->produccion_mensual;
            $insertar->promedio = $promedio;
            $insertar->total = $insertar->consumo_produccion * $insertar->produccion_mensual;
            $insertar->id_cif = $id_cif;
            $insertar->save();
        }

        if ($campo) {
            $insertar = t_valores::findOrFail($id_cif);
            $insertar->porcentaje_utilizacion = $request->porcentaje_utilizacion;
            $insertar->consumo_empresa = ($insertar->porcentaje_utilizacion * $promedio) / 100;
            $insertar->porcentaje_produccion = $request->porcentaje_produccion;
            $insertar->consumo_produccion = ($insertar->consumo_empresa * $insertar->porcentaje_produccion) / 100;
            $insertar->produccion_mensual = $request->produccion_mensual;
            $insertar->promedio = $promedio;
            $insertar->total = $insertar->consumo_produccion * $insertar->produccion_mensual;
            $insertar->id_cif = $id_cif;
            $insertar->save();
        }
        // Redirigir a la vista original 
        return back();
    }

    //Guardamos los meses
    public function store(Request $request, $id_cif)
    {
        request()->validate([
            'fecha' => 'required|date',
            'recibo_pagar' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
        ]);

        $agregar = new t_mes();
        $agregar->fecha = $request->fecha;
        $agregar->recibo_pagar = $request->recibo_pagar;
        $agregar->id_cif = $id_cif;
        $agregar->save();

        $suma = 0;
        $cantidad = 0;
        $promedio = 0;

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

        $insertar = t_valores::findOrFail($id_cif);
        $insertar->porcentaje_utilizacion = $insertar->porcentaje_utilizacion;
        $insertar->consumo_empresa = ($insertar->porcentaje_utilizacion * $promedio) / 100;
        $insertar->porcentaje_produccion = $insertar->porcentaje_produccion;
        $insertar->consumo_produccion = ($insertar->consumo_empresa * $insertar->porcentaje_produccion) / 100;
        $insertar->produccion_mensual = $insertar->produccion_mensual;
        $insertar->promedio = $promedio;
        $insertar->total = $insertar->consumo_produccion * $insertar->produccion_mensual;
        $insertar->id_cif = $id_cif;
        $insertar->save();

        return back()->with('eliminar', 'fue eliminado exitosamente');
    }

    //Actualizar cada mes o meses
    public function mes(Request $request, $id_cif, $id_mes)
    {

        // Inicializamos las variables para su calculo respectivo
        $suma = 0;
        $cantidad = 0;
        $promedio = 0;

        // $cif = t_cif::findOrFail($id_cif);

        // Agregamos el recibo
        $agregar = t_mes::findOrFail($id_mes);
        $agregar->recibo_pagar = $request->input('recibo_pagar');
        $agregar->save();

        // Calculamos el promedio
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

        // Actualizamos la tabla valores para los calculos
        $insertar = t_valores::findOrFail($id_cif);
        $insertar->porcentaje_utilizacion = $insertar->porcentaje_utilizacion;
        $insertar->consumo_empresa = ($insertar->porcentaje_utilizacion * $promedio) / 100;
        $insertar->porcentaje_produccion = $insertar->porcentaje_produccion;
        $insertar->promedio = $promedio;
        $insertar->id_cif = $id_cif;
        $insertar->save();

        $consumo = DB::table('t_valores')->get();
        foreach ($consumo as $item) {
            if ($id_cif == $item->id_cif) {
                $calculo = t_valores::findOrFail($id_cif);
                $calculo->produccion_mensual = $item->produccion_mensual;
                $calculo->consumo_produccion = ($item->consumo_empresa) * ($item->porcentaje_produccion) / 100;
                $calculo->total = $calculo->consumo_produccion * $calculo->produccion_mensual;
            }
        }

        // Insertar en la base de datos
        $calculo->save();
        // Redirigir a la vista original 
        return back()->with('valor', 'El usuario se ha agregado');
    }

    //Actualizar valores
    public function update(Request $request, $id_cif)
    {
        $suma = 0;
        $cantidad = 0;
        $promedio = 0;

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

        $insertar = t_valores::findOrFail($id_cif);
        $insertar->porcentaje_utilizacion = $request->porcentaje_utilizacion;
        $insertar->consumo_empresa = ($insertar->porcentaje_utilizacion * $promedio) / 100;
        $insertar->porcentaje_produccion = $request->porcentaje_produccion;
        $insertar->consumo_produccion = ($insertar->consumo_empresa * $insertar->porcentaje_produccion) / 100;
        $insertar->produccion_mensual = $request->produccion_mensual;
        $insertar->promedio = $promedio;
        $insertar->total = $insertar->consumo_produccion * $insertar->produccion_mensual;
        $insertar->id_cif = $id_cif;
        $insertar->save();
        return back()->with('insertar', 'fue eliminado exitosamente');
    }

    //Eliminar mes 
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

        $insertar = t_valores::findOrFail($id_cif);
        $insertar->porcentaje_utilizacion = $insertar->porcentaje_utilizacion;
        $insertar->consumo_empresa = ($insertar->porcentaje_utilizacion * $promedio) / 100;
        $insertar->porcentaje_produccion = $insertar->porcentaje_produccion;
        $insertar->promedio = $promedio;
        $insertar->save();
        // Insertar en la base de datos

        $consumo = DB::table('t_valores')->get();
        foreach ($consumo as $item) {
            if ($id_cif == $item->id_cif) {
                $calculo = t_valores::findOrFail($id_cif);
                $calculo->produccion_mensual = $item->produccion_mensual;
                $calculo->consumo_produccion = ($item->consumo_empresa) * ($item->porcentaje_produccion) / 100;
                $calculo->total = ($calculo->consumo_produccion * $calculo->produccion_mensual);
            }
        }

        // Insertar en la base de datos
        $calculo->save();

        return back()->with('eliminar', 'fue eliminado exitosamente');
    }
}
