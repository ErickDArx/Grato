<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_valores extends Model
{
    protected $primaryKey = "id_valores";
    protected $remember_token = false;
    protected $table = "t_valores";
    public $timestamps = false;
}
