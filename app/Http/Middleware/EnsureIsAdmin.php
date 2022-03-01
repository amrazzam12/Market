<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureIsAdmin
{

    public function handle(Request $request, Closure $next)
    {

        if (!Auth::user()  || Auth::user()->role  !== 'admin'){
            abort(403);
        }

        return $next($request);
    }
}
