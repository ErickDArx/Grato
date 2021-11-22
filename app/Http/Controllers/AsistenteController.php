<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\t_usuario;
use Carbon\Carbon;

class AsistenteController extends Controller
{

    //Funcion que muestra la vista de Asistentes y valores de la tabla t_usuarios
    public function index(Request $request)
    {
        //Busqueda del nombre
        $busqueda = $request->get('busqueda');

        //Muestreme los datos de la tabla t_usuario, de forma que su sus nombre_operario de vean de forma descendiente
        //Ejecutar la busqueda
        //Paginacion 
        $usuarios = t_usuario::orderBy('nombre_operario', 'DESC')
            ->Busqueda($busqueda)
            ->paginate(6);
        return view('usuarios/Asistentes', ['t_usuario' => $usuarios]);
    }

    //funcion que almacena los datos de la tabla t_usuario
    public function store(Request $request)
    {
        // Validaciones y mensajes de validacion personalizados
        request()->validate([
            'nombre_operario' => 'required |alpha | regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'apellido_usuario' => 'required |alpha| regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'segundo_apellido_usuario' => 'required|alpha| regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'nombre_usuario' => 'required|unique:t_usuario,nombre_usuario|alpha_dash|min:6',
            'correo' => 'required | email | max:255 | unique:t_usuario,email',
            'password' => 'required | min:8 | max:16',
        ], [
            'nombre_operario.required' => 'El campo: Nombre del operario, no puede estar vacio',
            'nombre_operario.alpha' => 'El campo: Nombre del operario, no puede tener espacios ni numeros',
            'apellido_usuario.required' => 'El campo: Apellido del operario, no puede estar vacio',
            'segundo_apellido_usuario.required' => 'El campo: Segundo apellido del operario, no puede estar vacio',
            'nombre_usuario.required' => 'El campo: Nombre de usuario, no puede estar vacio',
            'correo.required' => 'El campo: Correo electronico, no puede estar vacio',
            'password.required' => 'El campo: Contraseña, no puede estar vacio',
            'password.min' => 'La contraseña debe tener minimo 8 caracteres',
        ]);

        // Agregar un nuevo usuario en la tabla : t_usuario
        $agregar = new t_usuario();
        $agregar->nombre_operario = $request->nombre_operario;
        $agregar->apellido_usuario = $request->apellido_usuario;
        $agregar->segundo_apellido_usuario = $request->segundo_apellido_usuario;
        $agregar->nombre_usuario = $request->nombre_usuario;
        $agregar->email = $request->correo;
        // Encriptar por MD5 la contraseña
        $agregar->password = bcrypt($request->password);
        $agregar->rol = 0;
        // Insertar en la base de datos
        $agregar->save();
        // Redirigir a la vista original
        return back();
    }

    //Funcion para actualizar el rol del usuario segun el ID
    public function update(Request $request, $id_usuario)
    {
        $actualizar = t_usuario::findOrFail($id_usuario);
        $actualizar->rol = $request->rol;
        // Metodo para editar el registro con el ID que se envia por parametros
        $actualizar->save();
        //retornar a la vistas
        return back();
    }

    // Funcion que elimina al usuairo segun el ID
    public function destroy($id_usuario)
    {
        //Buscar parametro dentro de la tabla, segun el id_usuario
        $eliminar = t_usuario::findOrFail($id_usuario);
        // Metodo para eliminar el registro con el ID que se envia por parametros
        $eliminar->delete();
        //retornar a la vista
        return back();
    }
}
