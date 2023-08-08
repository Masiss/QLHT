<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('guardian')->viaRemember() || auth('guardian')->check()) {
            return redirect()->route('guardian.index');
        }
        if (auth('child')->viaRemember() || auth('child')->check()) {
            return redirect()->route('child.index');
        }
        return $next($request);
    }
}
