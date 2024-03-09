<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
    }

    public function register(Request $request)
    {
        try {
            $payload = $request->all();
            $newUser = $this->userService->createNewUser($payload);
            return response()->apiResponse($newUser);
        } catch (Exception $e) {
            return response()->apiResponse([
                "messsage" => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}