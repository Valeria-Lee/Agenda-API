<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Allow all origins, or restrict to a specific domain in production.
        $response->headers->set('Access-Control-Allow-Origin', '*'); // Use '*' for all origins, or specify a domain

        // Specify allowed methods
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

        // Specify allowed headers
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With, Authorization');

        // Allow pre-flight requests (OPTIONS method)
        $response->headers->set('Access-Control-Max-Age', '3600');

        return $response;
    }
}
