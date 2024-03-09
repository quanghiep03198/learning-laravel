<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Facades\JWTAuth;

class CheckAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header("Authorization");
        if (!$token)
            return response()->apiResponse(
                ["message" => "Invalid token"],
                Response::HTTP_UNAUTHORIZED
            );

        $user = JWTAuth::parseToken()->authenticate();
        if (!($user->toArray()))
            throw new UnauthorizedHttpException("Unauthorized");

        $request["user"] = [
            "id" => $user->toArray()["id"],
            "role" => $user->toArray()["role"]
        ];


        return $next($request);
    }
}
