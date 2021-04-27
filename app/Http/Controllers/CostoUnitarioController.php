<?php

namespace App\Http\Controllers;

use App\t_costo_unitario;
use Illuminate\Http\Request;
use App\t_producto;
use App\t_totales;
use App\t_equipos;
use App\t_mano_de_obra;
use App\t_precio_venta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CostoUnitarioController extends Controller
{

  public function index($id_producto)
  {
    $id_producto = decrypt($id_producto);
    $producto = t_producto::findOrFail($id_producto);

    $costos = DB::table('t_costo_unitario')->get();
    $productos = DB::table('t_producto')->get();
    $recursos = DB::table('t_materia_prima')->get();
    $operario = DB::table('t_mano_de_obra')->get();
    $equipo = DB::table('t_equipos')->get();
    $cif = DB::table('t_valores')->get();
    $viaticos = DB::table('t_viaticos')->get();
    $resultados = DB::table('t_totales')->get();
    $precio = DB::table('t_precio_venta')->get();

    $sumaCIF = 0.00;
    $calculo = DB::table('t_valores')->get();
    foreach ($calculo as $item) {
      $sumaCIF = $sumaCIF + $item->total;
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
        if ($eq->id_equipo == $item->id_equipo && $item->id_producto == $id_producto) {
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
      $total->total = $sumaCIF + $sumaMP + $sumaMO + $sumaEQ + $sumaVI;
      $total->cantidad_producir = $total->cantidad_producir;
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
      $total->total = $sumaCIF + $sumaMP + $sumaMO + $sumaEQ + $sumaVI;
      $total->cantidad_producir = $total->cantidad_producir;
      $total->save();
    }

    return view(
      'modulos/CostoUnitario',
      compact('producto'),
      ['t_materia_prima' => $recursos, 't_mano_de_obra' => $operario, 't_costo_unitario' => $costos, 't_equipos' => $equipo, 't_valores' => $cif, 't_viaticos' => $viaticos, 't_totales' => $resultados, 't_materia_prima' => $recursos, 't_precio_venta'=>$precio]
    );
  }

  public function operario(Request $request, $id_producto)
  {

    request()->validate([
      'id_mano_de_obra' => 'required | numeric'
    ], [
      'id_mano_de_obra.numeric' => 'Debes seleccionar un operario'
    ]);

    $agregar = new t_costo_unitario();
    $agregar->id_producto = $id_producto;
    $agregar->id_mano_de_obra = $request->id_mano_de_obra;
    $agregar->fecha = Carbon::now();
    // Insertar en la base de datos
    $agregar->save();

    $suma = 0.00;
    $calculo = DB::table('t_mano_de_obra')->get();
    foreach ($calculo as $item) {
      $suma = $suma + $item->costo_minuto;
    }

    $campo = t_totales::where('id_producto', $id_producto)->first();
    if ($campo) {
      $total = t_totales::findOrFail($id_producto);
      $total->id_producto = $id_producto;
      $total->total_mano_de_obra = $suma;
      $total->save();
    }
    if (!$campo) {
      $total = new t_totales();
      $total->id_producto = $id_producto;
      $total->total_mano_de_obra = $suma;
      $total->save();
    }

    // Redirigir a la vista original 
    return redirect()->route('IndexCU', ['id_producto' => encrypt($id_producto)]);
  }

  public function total(Request $request, $id_mano_de_obra)
  {

    $agregar = t_mano_de_obra::findOrFail($id_mano_de_obra);
    $agregar->tiempo_trabajado = $request->tiempo_trabajado;
    $agregar->costo_minuto = $request->tiempo_trabajado * $agregar->salario_minuto;
    // Insertar en la base de datos
    $agregar->save();

    $sumaMO = 0.00;
    $calculo = DB::table('t_mano_de_obra')->get();
    foreach ($calculo as $item) {
      $sumaMO = $sumaMO + $item->costo_minuto;
    }

    $campo = t_totales::where('id_producto', $request->id_producto)->first();
    if (!$campo) {
      $costo = new t_costo_unitario();
      $costo->id_producto = $request->id_producto;
      $total = new t_totales();
      $total->id_producto = $request->id_producto;
      $total->total_mano_de_obra = $sumaMO;
      $total->total = $total->sumaCIF + $total->sumaMP + $sumaMO + $total->sumaEQ + $total->sumaVI;
      $total->save();
    }
    if ($campo) {
      $total = t_totales::findOrFail($request->id_producto);
      $total->id_producto = $request->id_producto;
      $total->total_mano_de_obra = $sumaMO;
      $total->total = $total->total_cif + $total->total_materia_prima + $sumaMO + $total->total_equipos + $total->total_viaticos;
      $total->save();
    }

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

    $sumaEQ = 0.00;
    $equipo = DB::table('t_equipos')->get();
    $costo = DB::table('t_costo_unitario')->get();
    foreach ($costo as $item) {
      foreach ($equipo as $eq) {
        if ($eq->id_equipo == $item->id_equipo && $item->id_producto == $id_producto) {
          $sumaEQ = $sumaEQ + $eq->costo;
        }
      }
    }

    $campo = t_totales::where('id_producto', $request->id_producto)->first();
    if (!$campo) {
      $total = new t_totales();
      $total->id_producto = $request->id_producto;
      $total->total_equipo = $sumaEQ;
      $total->total = $total->sumaCIF + $total->sumaMP + $total->total_mano_de_obra + $total->sumaEQ + $total->sumaVI;
      $total->save();
    }
    if ($campo) {
      $total = t_totales::findOrFail($request->id_producto);
      $total->id_producto = $request->id_producto;
      $total->total_mano_de_obra = $sumaEQ;
      $total->total = $total->sumaCIF + $total->sumaMP + $total->total_mano_de_obra + $total->sumaEQ + $total->sumaVI;
      $total->save();
    }

    // Redirigir a la vista original 
    return back();
  }

  public function costo(Request $request, $id_equipo)
  {
    $edit = t_equipos::findOrFail($id_equipo);
    $edit->tiempo_minutos = $request->tiempo_minutos;
    $edit->costo = $request->tiempo_minutos * $edit->depreciacion_minuto;
    $edit->save();

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

    $campo = t_totales::where('id_producto', $request->id_producto)->first();
    if (!$campo) {
      $costo = new t_costo_unitario();
      $costo->id_producto = $request->id_producto;
      $total = new t_totales();
      $total->id_producto = $request->id_producto;
      $total->total_equipos = $sumaEQ;
      $total->total = $total->total_materia_prima + $total->total_mano_de_obra + $total->sumaEQ + $total->total_cif + $total->total_viaticos;
      $total->save();
    }
    if ($campo) {
      $total = t_totales::findOrFail($request->id_producto);
      $total->id_producto = $request->id_producto;
      $total->total_equipos = $sumaEQ;
      $total->total = $total->total_materia_prima + $total->total_mano_de_obra + $total->sumaEQ + $total->total_cif + $total->total_viaticos;
      $total->save();
    }

    return back();
  }

  public function eoperario(Request $request,$id_costo_unitario)
  {
    $agregar = t_costo_unitario::findOrFail($id_costo_unitario);
    $agregar->id_mano_de_obra = NULL;
    $agregar->save();

    // Redirigir a la vista original 
    return back();
  }

  public function eequipo($id_costo_unitario)
  {
    $agregar = t_costo_unitario::findOrFail($id_costo_unitario);
    $agregar->id_equipo = NULL;
    $agregar->save();
    // Redirigir a la vista original 
    return back();
  }
}
