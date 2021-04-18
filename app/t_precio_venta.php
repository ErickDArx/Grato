<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_precio_venta extends Model
{
    protected $table = "t_precio_venta";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_precio_venta'];
    protected $primaryKey = "id_precio_venta";
}
