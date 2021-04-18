<?php

namespace App\Http\Controllers;

use App\t_equipos;
use App\t_usuario;
use App\t_producto;
use App\t_totales;
use App\t_labores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EquiposController extends Controller
{

    public function index()
    {
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $equipos = DB::table('t_equipos')->get();
        $laborales = DB::table('t_labores')->get();
        return view('modulos/Equipo' , ['t_equipos' => $equipos,'t_labores' => $laborales]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
            $agregar = new t_equipos();
            $agregar->nombre_equipo = $request->nombre_equipo;
            $agregar->precio = $request->precio;
            $agregar->vida_util = $request->vida_util;
            $agregar->porcentaje_utilizacion = $request-> porcentaje_utilizacion;


            $agregar->depreciacion_anual = $agregar->precio / $agregar->vida_util;
            $agregar->depreciacion_anual_real = ($agregar->depreciacion_anual * $agregar->porcentaje_utilizacion)/100;
            $agregar->depreciacion_mensual = $agregar->depreciacion_anual_real / 12;
            $agregar->depreciacion_semanal = $agregar->depreciacion_mensual / 4.33;
            $agregar->depreciacion_diaria = $agregar->depreciacion_semanal / $request->dias_laborales_semana;
            $agregar->depreciacion_hora = $agregar->depreciacion_diaria / $request->horas_laborales_dia; 
            $agregar->depreciacion_minuto = $agregar->depreciacion_hora / 60;

            // Insertar en la base de datos
            $agregar->save();
            // Redirigir a la vista original 
            return back()->with('agregar', 'El usuario se ha agregado');
    }

    public function update(Request $request, $id_equipo)
    {
        $edit = t_equipos::findOrFail($id_equipo);
        $edit->nombre_equipo = $request->nombre_equipo;
        $edit->precio = $request->precio;
        $edit->vida_util = $request->vida_util;
        $edit->porcentaje_utilizacion = $request-> porcentaje_utilizacion;
        $edit->depreciacion_anual =  $edit->precio /  $edit->vida_util;
        $edit->depreciacion_anual_real = ( $edit->depreciacion_anual *  $edit->porcentaje_utilizacion)/100;
        $edit->depreciacion_mensual =  $edit->depreciacion_anual_real / 12;
        $edit->depreciacion_semanal =  $edit->depreciacion_mensual / 4.33;
        $edit->depreciacion_diaria =  $edit->depreciacion_semanal / $request->dias_laborales_semana;
        $edit->depreciacion_hora =  $edit->depreciacion_diaria / $request->horas_laborales_dia; 
        $edit->depreciacion_minuto =  $edit->depreciacion_hora / 60;
        $edit->save();
        return back()->with('Perfil','Todo salio bien');
    }

    public function destroy($id_equipo)
    {
        $eliminar = t_equipos::findOrFail($id_equipo);
        $eliminar->delete();
        return back()->with('eliminar', 'fue eliminado exitosamente');
    }
}
