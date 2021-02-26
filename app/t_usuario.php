<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContracts;
use Illuminate\Auth\Authenticatable;
class t_usuario extends Model implements AuthenticatableContracts
{
    use Authenticatable;
    public $table="t_usuario";
}
