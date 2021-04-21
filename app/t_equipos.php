<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_equipos extends Model
{
    protected $table = "t_equipos";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_equipo'];
    protected $primaryKey = "id_equipo";

    public function scopeBusqueda($query, $busqueda)
    {
        if ($busqueda) {
            return $query->where('nombre_equipo', 'LIKE', "%$busqueda%");
        }
    }
}
