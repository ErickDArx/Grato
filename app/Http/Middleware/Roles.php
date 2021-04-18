<?php

namespace App\Http\Middleware;
use App\t_usuario;
use Closure;
use Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
        if (Auth::check() && Auth::user()->rol == '1') {
            return $next($request);
        }
        return redirect('/Principal');
    }
}
