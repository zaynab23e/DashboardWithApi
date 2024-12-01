<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = Auth::guard('admin')->user();
        
        if (!$admin || !$admin->email) {
            return response()->json(['message' => 'Unauthorized: Only admins can access this route'], 403);
        }

        return $next($request);
    }
}
