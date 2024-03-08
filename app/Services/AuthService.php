<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\Interfaces\AuthServiceInterface;
use Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function verifyUser($payload)
    {
        $foundUser =  $this->userRepository->findOneByEmail($payload['email']);
        if (!isset($foundUser)) {
            throw new NotFoundHttpException('User not found', null, Response::HTTP_NOT_FOUND);
        }

        $isCorrectPassword = Hash::check($payload['password'], $foundUser->getOriginal()['password']);

        if (!$isCorrectPassword) {
            throw new BadRequestHttpException('Incorrect password', null, Response::HTTP_UNAUTHORIZED);
        }

        return $foundUser;
    }
}
