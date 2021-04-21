<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class UsuarioController extends Controller
{
    //Funcion para la vista de la pagina principal
    public function principal()
    {
        //Obtener el conteo de datos
        $producto = DB::table('t_producto')->count();
        $operarios = DB::table('t_mano_de_obra')->count();
        $materia = DB::table('t_materia_prima')->count();
        $equipo= DB::table('t_equipos')->count();

        // Obtener todos los datos
        $promedio= DB::table('t_valores')->get();
        $viaticos= DB::table('t_viaticos')->get();
        $cif = DB::table('t_valores')->get();

        //Retornar a la vista principal
        return view('Principal', compact('producto', 'operarios', 'cif',
    'materia','equipo','promedio','viaticos'));
    }
}
