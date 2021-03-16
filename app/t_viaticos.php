<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_viaticos extends Model
{
    protected $primaryKey = "id_viatico";
    protected $remember_token = false;
    protected $table = "t_viaticos";
    public $timestamps = false;
}
