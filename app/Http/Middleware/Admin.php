<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role != 's.admin'){
            abort(403);
        }
        return $next($request);
    }
}
