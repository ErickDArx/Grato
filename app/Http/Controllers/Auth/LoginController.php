<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\t_usuario;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function authenticate(Request $request) {
        
        $t_usuario = t_usuario::where('nombre_usuario'
        ,$request->nombre_usuario)->where('password',
        $request->password)->first();

        // $nombre_usuario = $request->input('nombre_usuario');
        // $password = $request->input('password');

        if ($t_usuario) {
            Auth::loginUsingId($t_usuario->id_usuario);
            return view('Principal');
         }else{
            return redirect('login')->with('status', 'Datos Incorrectos!');
         }
    }
    protected $redirectTo = '/Principal';

    public function username()
    {
        return 'nombre_usuario';
    }

    public function index()
    {
        return view('Acceso');
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
    
        return $this->loggedOut($request) ?: redirect('/login');
    }
}
