<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_totales extends Model
{
    protected $primaryKey = "id_total";
    protected $remember_token = false;
    protected $table = "t_totales";
    protected $guarded = ['id_total'];
}
