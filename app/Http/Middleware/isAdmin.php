<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class isAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && in_array(Auth::user()->getRole(), ['admin', 'developer'])) {
            return $next($request);
        }
        abort(404);
    }
}
