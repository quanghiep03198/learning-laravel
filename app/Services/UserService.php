<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function createNewUser($payload)
    {
        $newUser = $this->userRepository->createUser($payload);
        return $newUser;
    }
}
