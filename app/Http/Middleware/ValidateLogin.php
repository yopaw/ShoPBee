<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //TODO VALIDATE USER ROLE IS ALREADY LOGIN
        if($request->user() != null) return redirect()->route('home');
        return $next($request);
    }
}
