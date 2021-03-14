<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_labores extends Model
{
    protected $table = "t_labores";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_labor'];
    protected $primaryKey = "id_labor";
}
