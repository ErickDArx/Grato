<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_recetario extends Model
{
    protected $table = "t_recetario";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_recetario'];
    protected $primaryKey = "id_recetario";
}
