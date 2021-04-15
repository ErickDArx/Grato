<?php

namespace App\Http\Middleware;
use App\t_usuario;
use Closure;

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
        if (auth()->check() && auth()->user()->rol) {
            return $next($request);
            
        }
        return redirect('/');
    }
}
