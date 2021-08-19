<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateAdmin
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
        //TODO VALIDATE USER ROLE IS ADMIN
        $user = $request->user();
        if($user->role->name != 'Admin') return redirect()->route('home');
        return $next($request);
    }
}
