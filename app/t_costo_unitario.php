<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_costo_unitario extends Model
{
    protected $table = "t_costo_unitario";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_costo_unitario'];
    protected $primaryKey = "id_costo_unitario";
}
