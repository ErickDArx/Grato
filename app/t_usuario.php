<?php

namespace App;
use Illuminate\Foundation\Auth\User as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;


class t_usuario extends AuthenticatableContract
{
    use Notifiable;
    protected $primaryKey = "id_usuario";
    protected $remember_token = false;
    protected $table = "t_usuario";

    protected $fillable = [
        'nombre_usuario',
        'apellido_usuario',
        'correo',
        'password',
        'puesto',
        'roll',
        'created_at',
        'updated_at',
        'remember_token',
    ];

    protected $guarded = ['id_usuario'];
}

