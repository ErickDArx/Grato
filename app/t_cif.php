<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_cif extends Model
{
    protected $table = "t_cif";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_cif'];
    protected $primaryKey = "id_cif";

    public function scopeBusqueda($query, $busqueda)
    {
        if ($busqueda) {
            return $query->where('nombre_cif', 'LIKE', "%$busqueda%");
        }
    }
}
