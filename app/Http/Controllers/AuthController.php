<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\AuthServiceInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct(protected AuthServiceInterface $authService)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $req): JsonResponse
    {
        try {
            $validator = Validator::make($req->all(), [
                'email' => 'required|email',
                'password' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'messages' => $validator->messages()->first(),

                ], HttpFoundationResponse::HTTP_BAD_REQUEST);
            }

            $user = $this->authService->verifyUser($validator->validated());

            return response()->json($user, HttpFoundationResponse::HTTP_OK);
        } catch (HttpException $e) {
            return response()->json(
                [
                    "message" => $e->getMessage(),
                    "status" => $e->getStatusCode()
                ],
                $e->getStatusCode()
            );
        }
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'message' => 'Logged out successfully',
            'status'
        ]);
    }
}
