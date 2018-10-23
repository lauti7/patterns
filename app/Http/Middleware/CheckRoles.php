<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
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
        //$roles = func_get_args(); // obtiene los argumentos de la func



        $roles = array_slice(func_get_args(), 2); //sacas los arrays que quieras del array

        //dd($roles);

        if (auth()->user()->hasRoles($roles))
        {
            return $next($request);
        }

        return redirect('/');
    }
}
