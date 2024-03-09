<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AllFilterExceptions
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $response = $next($request);
            return $response;
        } catch (Exception | HttpException $e) {
            if ($e instanceof HttpException)
                return response()->apiResponse([
                    "message" => $e->getMessage(),
                    "status_code" => $e->getStatusCode()
                ], $e->getMessage(), $e->getStatusCode());

            else return response()->apiResponse([
                "message" => $e->getMessage(),
                "status_code" => Response::HTTP_INTERNAL_SERVER_ERROR
            ], $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
