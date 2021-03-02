<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_mano_de_obra extends Model
{
    protected $table = "t_mano_de_obra";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_mano_de_obra'];
    protected $primaryKey = "id_mano_de_obra";

}
