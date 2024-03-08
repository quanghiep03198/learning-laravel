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

    public function register(Request $req)
    {
        try {
            $payload = $req->all();
            $newUser = $this->userService->createNewUser($payload);
            return response()->json($newUser);
        } catch (Exception $e) {
            return response()->json([
                "messsage" => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
