<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class isAccess
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (! $request->user()->getRole($role)) {
            dd($role);
        }
        return $next($request);
    }
}
