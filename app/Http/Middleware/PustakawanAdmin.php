<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PustakawanAdmin
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
        
        $adminUser = auth()->guard('admin')->user();
        
        if ($adminUser && ($adminUser->f_level == 'Admin' || $adminUser->f_level == 'Pustakawan')) {
            return $next($request);
        }
        
        return redirect()->back();
        
    }
}
