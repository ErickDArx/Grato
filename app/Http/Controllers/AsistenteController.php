<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t_usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AsistenteController extends Controller
{

    public function index(Request $request)
    {
        $busqueda = $request->get('busqueda');
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        $date->diffForHumans();
        $usuarios = t_usuario::orderBy('id_usuario','DESC')
        ->Busqueda($busqueda)
        ->paginate(4);
        return view('usuarios/Asistentes', ['t_usuario' => $usuarios]);
    }

    public function destroy($id_usuario)
    {
    $eliminar = t_usuario::findOrFail($id_usuario);
    $eliminar -> delete();
    return back()->with('eliminar','El asistente fue eliminado exitosamente');
    }
}
