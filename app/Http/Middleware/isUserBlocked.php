<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class isUserBlocked
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status_id == 1) { //active
            return $next($request);
        }
        return redirect()->route('home')->with('fail', 'Данный пользователь заблокирован в системе!');
    }
}
