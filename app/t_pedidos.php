<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class t_pedidos extends Model
{
    protected $table = "t_pedidos";
    protected $remember_token = false;
    public $timestamps = false;
    protected $guarded = ['id_Pedido'];
    protected $primaryKey = "id_Pedido";
}
