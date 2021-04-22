<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\t_totales;
use App\t_producto;
use App\t_precio_venta;

class PrecioVentaController extends Controller
{

    public function index(Request $request, $id_producto)
    {

        $totales = DB::table('t_totales')->get();
        $precio = DB::table('t_precio_venta')->get();
        $producto = t_producto::findOrFail($id_producto);

        return view('modulos/PrecioVenta', compact('producto'), ['t_totales' => $totales, 't_precio_venta' => $precio]);
    }

    public function store(Request $request, $id_producto)
    {
        request()->validate([
            'margen_utilidad' => 'required|numeric|min:1'
        ]);
        $cu = 0;
        $totales = DB::table('t_totales')->get();
        foreach ($totales as $item) {
            if ($item->id_producto == $id_producto) {
                $cu = $item->total / $item->cantidad_producir;
            }
        }

        $costos =t_precio_venta::findOrFail($id_producto);
        $costos->id_producto = $id_producto;
        $costos->margen_utilidad = $request->margen_utilidad;
        $costos->ganancia_unidad = ($cu * $request->margen_utilidad) / 100;
        $costos->precio_venta = $cu + $costos->ganancia_unidad;
        $costos->save();

        return back();
    }

    public function update(Request $request, $id_producto)
    {

        request()->validate([
            'cantidad'=>'required|min:1|numeric'
        ]);
        $totales = DB::table('t_totales')->get();

        $campo = t_precio_venta::where('id_producto', $request->id_producto)->first();
        if (!$campo) {
            $precio =  new t_precio_venta();
            $precio->id_producto = $id_producto;
            $precio->save();
        }

        $costos = t_totales::findOrFail($id_producto);
        $costos->cantidad_producir = $request->cantidad;
        $costos->save();
        return redirect()->route('IndexPV', ['id_producto' => $id_producto]);
    }

}
