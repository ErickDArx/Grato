<?php

namespace App\Http\Controllers;

use App\User;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class UsuarioController extends Controller
{

    public function index()
    {
        $users = DB::table('users')->get();
        date_default_timezone_set('America/Costa_Rica');
        $date = Carbon::now()->locale('es_ES');
        return view('usuarios\Asistentes', ['users' => $users]);
    }

    public function principal()
    {
        setlocale(LC_ALL, "es_ES");
        \Carbon\Carbon::setLocale('es');
        $producto = DB::table('t_producto')->count();
        $operarios = DB::table('t_mano_de_obra')->count();
        $cif = DB::table('t_valores')->get();
        return view('Principal', compact('producto', 'operarios', 'cif'));
    }
}
