<?php

namespace App\Http\Controllers;

use App\t_costo_unitario;
use App\t_equipos;
use App\t_mano_de_obra;
use App\t_materia_prima;
use App\t_precio_venta;
use App\t_producto;
use App\t_totales;
use App\t_valores;
use App\t_viaticos;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportesController extends Controller
{
    public function index()
    {
        $precio = t_precio_venta::all();
        $precio = DB::table('t_precio_venta')->get();
        $recursos = t_materia_prima::all();
        return view('modulos/Reportes', compact($recursos,$precio),['t_precio_venta'=>$precio]);
    }

    public function pdf($id_producto)
    {
        $producto = t_producto::findOrFail($id_producto);
        $recursos = t_materia_prima::all();
        $operarios = t_mano_de_obra::all();
        $totales = t_totales::all();
        $equipos = t_equipos::all();
        $cif = t_valores::all();
        $viaticos = t_viaticos::all();
        $precio = t_precio_venta::all();
        $costo = t_costo_unitario::all();

        $pdf = PDF::loadView('pdf/recursos', 
        compact('costo','recursos','producto','totales','operarios','equipos','cif','viaticos','precio'));

        return $pdf->stream('Precio de Venta.pdf');
    }

}
