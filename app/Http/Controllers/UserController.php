<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

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

    public function getProfile()
    {
        return response()->apiResponse(Auth::user(), "Ok", Response::HTTP_OK);
    }
}
