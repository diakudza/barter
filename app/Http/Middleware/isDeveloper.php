<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class isDeveloper
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->getRole() === 'developer')) {
            return $next($request);
        }
        return redirect()->back()->with('fail', 'Доступ к разделу только для разработчиков!');
    }
}
