<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAPIKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $apiKey = $request->post('x-api-key'); // used to get data in Request Body Parameter
        $apiKey = $request->header('x-api-key'); // used to get data in Request Headers

        if($apiKey !== config('credentials.x_api_key')) {
            return response('Forbidden', 403);
        }

        return $next($request);
    }
}
