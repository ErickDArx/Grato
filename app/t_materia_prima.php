<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class t_materia_prima extends Model
{
    protected $table = "t_materia_prima";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_materia_prima'];
    protected $primaryKey = "id_materia_prima";

    //Scope

    protected $fillable = [
        'producto'
    ];

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    public function scopeActive($query, $busqueda)
    {
        if ($busqueda) {
            return $query->where('producto', 'LIKE', "%$busqueda%");
        }
    }


}
