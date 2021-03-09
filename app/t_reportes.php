<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_reportes extends Model
{
    protected $table = "t_reportes";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_reporte'];
    protected $primaryKey = "id_reporte";
}
