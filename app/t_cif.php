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
}
