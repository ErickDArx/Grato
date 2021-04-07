<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_producto extends Model
{
    protected $table = "t_producto";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_producto'];
    protected $primaryKey = "id_producto";

    public function scopeMateria($query, $buscador)
    {
        if ($buscador) {
            return $query->where('nombre_producto', 'LIKE', "%$buscador%");
        }
    }
}
