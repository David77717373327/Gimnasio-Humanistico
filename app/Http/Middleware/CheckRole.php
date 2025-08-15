<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (! Auth::check()) {
            return redirect()->route('login'); // o donde quieras
        }

        if (Auth::user()->role !== $role) {
            abort(403, 'No autorizado');
        }

        return $next($request);
    }
}
