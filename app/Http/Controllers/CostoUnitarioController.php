<?php

namespace App\Http\Controllers;

use App\t_costo_unitario;
use Illuminate\Http\Request;
use App\t_producto;
use App\t_totales;
use App\t_materia_prima;
use App\t_mano_de_obra;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CostoUnitarioController extends Controller
{

    public function index($id_producto)
    {

        date_default_timezone_set('America/Costa_Rica');

        $producto = t_producto::findOrFail($id_producto);

        $costos = DB::table('t_costo_unitario')->get();
        $productos = DB::table('t_producto')->get();
        $recursos = DB::table('t_materia_prima')->get();
        $operario = DB::table('t_mano_de_obra')->get();
        $equipo = DB::table('t_equipos')->get();
        $cif = DB::table('t_valores')->get();
        $viaticos = DB::table('t_viaticos')->get();
        $resultados = DB::table('t_totales')->get();

        $sumaCIF = 0.00;
        $calculo = DB::table('t_valores')->get();
        foreach ($calculo as $item) {
            $suma = $sumaCIF + $item->total;
        }

        $sumaVI = 0.00;
        $calculo = DB::table('t_viaticos')->get();
        foreach ($calculo as $item) {
            $sumaVI = $sumaVI + $item->total_km;
        }

        $sumaMP = 0.00;
        $materia = DB::table('t_materia_prima')->get();
        foreach ($materia as $item) {
            if ($item->id_producto == $producto->id_producto) {
                $sumaMP = $sumaMP + $item->precio;
            }
        }

        $sumaMO = 0.00;
        $operario = DB::table('t_mano_de_obra')->get();
        foreach ($operario as $mo) {
            foreach ($costos as $cu) {
                if ($cu->id_producto == $producto->id_producto && $mo->id_mano_de_obra == $cu->id_mano_de_obra) {
                    $sumaMO = $sumaMO + $mo->costo_minuto;
                }
            }
        }

        $sumaEQ = 0.00;
        $equipo = DB::table('t_equipos')->get();
        $costo = DB::table('t_costo_unitario')->get();
        foreach ($costo as $item) {
            foreach ($equipo as $eq) {
                if ($eq->id_equipo == $item->id_equipo) {
                    $sumaEQ = $sumaEQ + $eq->costo;
                }
            }
        }

        $campo = t_totales::where('id_producto', $id_producto)->first();
        if (!$campo) {
            $costo = new t_costo_unitario();
            $costo->id_producto = $id_producto;
            $total = new t_totales();
            $total->id_producto = $id_producto;
            $total->total_cif = $sumaCIF;
            $total->total_materia_prima = $sumaMP;
            $total->total_mano_de_obra = $sumaMO;
            $total->total_equipos = $sumaEQ;
            $total->total_viaticos = $sumaVI;
            $total->save();
        }
        if ($campo) {
            $total = t_totales::findOrFail($id_producto);
            $total->id_producto = $id_producto;
            $total->total_cif = $sumaCIF;
            $total->total_materia_prima = $sumaMP;
            $total->total_mano_de_obra = $sumaMO;
            $total->total_equipos = $sumaEQ;
            $total->total_viaticos = $sumaVI;
            $total->save();
        }

        return view(
            'modulos/CostoUnitario',
            compact('producto'),
            ['t_materia_prima' => $recursos, 't_mano_de_obra' => $operario, 't_costo_unitario' => $costos, 't_equipos' => $equipo, 't_valores' => $cif, 't_viaticos' => $viaticos, 't_totales' => $resultados, 't_materia_prima' => $recursos]
        );
    }

    public function operario(Request $request, $id_producto)
    {

        $suma = 0;
        $calculo = DB::table('t_mano_de_obra')->get();
        foreach ($calculo as $item) {

            $suma = $suma + $item->costo_minuto;
        }
        $suma;

        $campo = t_totales::where('id_producto', $id_producto)->first();
        if (!$campo) {
            $total = new t_totales();
            $total->id_producto = $id_producto;
            $total->total_mano_de_obra = $suma;
            $total->save();
        }

        $agregar = new t_costo_unitario();
        $agregar->id_producto = $id_producto;
        $agregar->id_mano_de_obra = $request->id_mano_de_obra;
        $agregar->fecha = Carbon::now();
        // Insertar en la base de datos
        $agregar->save();
        // Redirigir a la vista original 
        return back()->with('agregar', 'El usuario se ha agregado');
    }

    public function equipo(Request $request, $id_producto)
    {

        $agregar = new t_costo_unitario();
        $agregar->id_producto = $id_producto;
        $agregar->id_equipo = $request->id_equipo;
        $agregar->fecha = Carbon::now();
        // Insertar en la base de datos
        $agregar->save();
        // Redirigir a la vista original 
        return back()->with('agregar', 'El usuario se ha agregado');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
