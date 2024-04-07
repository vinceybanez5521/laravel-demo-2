<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmployeeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $employeeId): Response
    {
        // echo $request->url();
        // echo $request->path();
        // $request->route('id') - used to get path parameter in a route
        // $request->input('page')
        if($request->route('id') == $employeeId) {
            return redirect()->route('restrict');
        }

        return $next($request);
    }
}
