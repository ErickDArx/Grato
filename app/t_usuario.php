<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContracts;
use Illuminate\Auth\Authenticatable;
class t_usuario extends Model
{
    public $table = "t_usuario";

    protected $fillable = [
        'nombre_usuario',
        'correo',
        'contraseña',
        'apellido_usuario',
        'puesto',
        'roll',
    ];
}
