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
        'id_usuario',
        'nombre_usuario',
        'apellido_usuario',
        'email',
        'password',
        'roll',
        'session_id',
    ];

    protected $guarded = ['id_usuario'];

    public function scopeBusqueda($query, $busqueda)
    {
        if ($busqueda) {
            return $query->where('nombre_operario', 'LIKE', "%$busqueda%");
        }
    }

}

