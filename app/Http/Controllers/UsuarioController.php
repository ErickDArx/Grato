<?php

namespace App\Http\Controllers;

use App\User;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use GuzzleHttp\Client;

class UsuarioController extends Controller
{

    public function principal()
    {
        $producto = DB::table('t_producto')->count();
        $operarios = DB::table('t_mano_de_obra')->count();
        $cif = DB::table('t_valores')->get();
        return view('Principal', compact('producto', 'operarios', 'cif'));
    }
}
