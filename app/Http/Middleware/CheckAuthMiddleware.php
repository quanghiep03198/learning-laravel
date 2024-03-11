<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $token = $request->header("Authorization");
            if (!$token)
                return response()->apiResponse(
                    ["message" => "Invalid token"],
                    Response::HTTP_UNAUTHORIZED
                );
            $token = str_replace('Bearer', '', $token);
            $user = JWTAuth::parseToken()->authenticate();
            if ((bool)JWTAuth::check() === false)
                throw new UnauthorizedHttpException("Unauthorized", "Token has expired");
            if (!$user)
                throw new UnauthorizedHttpException("Unauthorized");
            $user = $user->toArray();
            $request["user"] = [
                "id" => $user["id"],
                "role" => $user["role"]
            ];
            return $next($request);
        } catch (HttpException $e) {
            return response()->apiResponse(
                null,
                $e->getMessage(),
                Response::HTTP_UNAUTHORIZED
            );
        }
    }
}
