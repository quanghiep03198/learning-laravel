<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(protected AuthServiceInterface $authService)
    {
        $this->middleware('api', ['except' => ['login']]);
    }


    public function index()
    {
        return view('pages.login.page');
    }

    public function login(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->apiResponse([
                    'messages' => $validator->messages()->first(),
                ], Response::HTTP_BAD_REQUEST);
            }
            $user = $this->authService->verifyUser($validator->validated());

            $token = Auth::login($user);
            if (!$token)
                throw new UnauthorizedHttpException('Unauthorized');


            return redirect()->route('dashboard');
        } catch (HttpException $e) {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();

        return response()->apiResponse([
            "message" => 'Logged out successfully',
            "status_code" => Response::HTTP_OK
        ]);
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->apiResponse([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => Auth::factory()->getTTL() * 60,
            'user' => Auth::user()
        ], "Ok", Response::HTTP_CREATED);
    }


    public function refreshToken()
    {
        return $this->respondWithToken(Auth::refresh());
    }
}
