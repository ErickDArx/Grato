<?php

namespace App\Http\Middleware;
use App\t_usuario;
use Closure;
use Illuminate\Support\Facades\Auth;

class Roles
{

    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->rol == 1) {
            return $next($request);
        }
        return redirect('/Principal');
    }
}
