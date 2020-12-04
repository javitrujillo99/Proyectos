<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NoComprar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->rol == 'administrador') {
            flash('Los administradores no pueden comprar un partido')->error();
            return redirect()->route('games');
        }
        return $next($request);
    }
}
