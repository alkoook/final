<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class alreadyloggedin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('loginid') && (url('/')==$request->url()))
        {
            return back();
        }elseif(session()->has('loginidadmin') && (url('/')==$request->url())){
            return back();
        }
        return $next($request);
    }
}
