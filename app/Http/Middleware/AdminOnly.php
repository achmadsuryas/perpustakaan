<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guard('user')->check()) {
            return redirect()->back();
        }

        if (auth()->guard('admin')->check()) {
            if (auth()->guard('admin')->user()->f_level == 'Admin') {
                return $next($request);
            }
        }

        return redirect()->back();
    }
}
