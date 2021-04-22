<?php

namespace App\Http\Controllers;

use App\t_equipos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquiposController extends Controller
{

    //Funcion para la vista Equipo y sus modelos relacionados
    public function index(Request $request)
    {
        $busqueda = $request->get('busqueda');
        $equipos = t_equipos::orderBy('nombre_equipo','DESC')
        ->Busqueda($busqueda)
        ->paginate(6);
        $laborales = DB::table('t_labores')->get();
        return view('modulos/Equipo' , ['t_equipos' => $equipos,'t_labores' => $laborales]);
    }

    //Funcion para almacenar el equipo
    public function store(Request $request)
    {
        request()->validate([
            'nombre_equipo' => 'required|unique:t_equipos,nombre_equipo|string|min:6',
            'precio' => 'required|numeric|min:1',
            'vida_util' => 'required|numeric|min:1',
            'porcentaje_utilizacion' => 'required|numeric|min:1',
        ]);
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
            return back();
    }

    //Funcion para actualizar el equipo segun el ID
    public function update(Request $request, $id_equipo)
    {
        request()->validate([
            'precio_del_equipo' => 'required|numeric|min:1',
            'vida_util_del_equipo' => 'required|numeric|min:1',
            'porcentaje_utilizacion_del_equipo' => 'required|numeric|min:1',
        ]);
        $edit = t_equipos::findOrFail($id_equipo);
        $edit->nombre_equipo = $edit->nombre_equipo;
        $edit->precio = $request->precio_del_equipo;
        $edit->vida_util = $request->vida_util_del_equipo;
        $edit->porcentaje_utilizacion = $request-> porcentaje_utilizacion_del_equipo;
        $edit->depreciacion_anual =  $edit->precio /  $edit->vida_util;
        $edit->depreciacion_anual_real = ( $edit->depreciacion_anual *  $edit->porcentaje_utilizacion)/100;
        $edit->depreciacion_mensual =  $edit->depreciacion_anual_real / 12;
        $edit->depreciacion_semanal =  $edit->depreciacion_mensual / 4.33;
        $edit->depreciacion_diaria =  $edit->depreciacion_semanal / $request->dias_laborales_semana;
        $edit->depreciacion_hora =  $edit->depreciacion_diaria / $request->horas_laborales_dia; 
        $edit->depreciacion_minuto =  $edit->depreciacion_hora / 60;
        $edit->save();
        return back();
    }

    //Funcion para eliminar el equipo segun el ID
    public function destroy($id_equipo)
    {
        $eliminar = t_equipos::findOrFail($id_equipo);
        $eliminar->delete();
        return back();
    }
}
