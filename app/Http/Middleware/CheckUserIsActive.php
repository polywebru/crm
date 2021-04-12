<?php

namespace App\Http\Middleware;

use App\Exceptions\InactiveUserException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserIsActive
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
        if (Auth::user()->is_active) {
            return $next($request);
        } else {
            throw new InactiveUserException();
        }
    }
}
