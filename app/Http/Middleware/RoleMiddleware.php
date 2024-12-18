<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $role = Auth::user()->role->value;

        if (!in_array($role, $roles, true)) {
            return response()->view('pages.403', [], 403);
        }

        return $next($request);
    }
}
