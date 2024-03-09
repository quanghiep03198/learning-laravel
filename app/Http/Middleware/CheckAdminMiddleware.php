<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((string)$request["user"]["role"] !== "admin")
            return response()->apiResponse([
                "message" => "You're not allowed to access",
                "status" => Response::HTTP_FORBIDDEN
            ]);

        return $next($request);
    }
}
