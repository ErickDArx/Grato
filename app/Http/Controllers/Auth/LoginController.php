<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\t_usuario;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //Aqui se encuentran los metodos y funciones respectivos para el acceso de usuarios
    use AuthenticatesUsers;

    //Intentos maximos y minutos de espera para los usuarios bloqueados
    protected $maxAttempts = 3; // De manera predeterminada sería 5
    protected $decayMinutes = 5; // De manera predeterminada sería 1

    //Mostrar la vista que posee el formulario de acceso
    public function showLoginForm()
    {
        if (Auth::check()) {
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
        return view('Principal', compact('producto', 'operarios', 'cif', 'materia','equipo','promedio','viaticos'));
        } else {
            return view('usuarios/Acceso');
        }
    }

    //funcion para autenticar aquellos usuarios existentes en el sistema
    public function authenticate(Request $request)
    {
        $t_usuario = t_usuario::where(
            'nombre_usuario',
            $request->nombre_usuario
        )->where(
            'password',
            $request->password = bcrypt($request->password) // aqui se descifra la contraseña
        )->first();
        //Si el nombre de usuario y la contraseña son correctas, entonces te permite el acceso
        if ($t_usuario) {
            Auth::loginUsingId($t_usuario->nombre_usuario);
            return view('Principal');
            //De lo contrario, te redirige a la vista de acceso
        } else {
            return redirect('/')->with('status', 'Datos Incorrectos!');
        }
    }
    //Guardar la sesion del usuario y verificar que haya una session activa por usuario
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $previous_session = Auth::User()->session_id;
        if ($previous_session) {
            Session::getHandler()->destroy($previous_session);
        }

        Auth::user()->session_id = Session::getId();
        Auth::user()->save();
        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }

    protected $redirectTo = '/Principal';

    // Decirle a Lavarel que haga la verificacion por medio del nombre de usuario
    public function username()
    {
        return 'nombre_usuario';
    }

    //Verificar que el usuario este logeado
    public function index()
    {
        if (Auth::check()) {
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
        return view('Principal', compact('producto', 'operarios', 'cif', 'materia','equipo','promedio','viaticos'));

        } else {
            return view('usuarios/Acceso');
        }
    }

    //Cerrar sesion
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
