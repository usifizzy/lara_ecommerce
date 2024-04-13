<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\StoreController;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // $user = Auth::user();
        // Check if the authenticated user has the admin role
        if (!auth()->user() || auth()->user()->role != 'Admin') {
            // User is not authorized, handle accordingly
            // abort(403, 'Unauthorized.');

            return redirect()->action([StoreController::class, 'index']);
        }
        return $next($request);
    }
}
