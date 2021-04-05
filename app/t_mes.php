<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_mes extends Model
{

    protected $table = "t_mes";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_mes'];
    protected $primaryKey = "id_mes";

}
