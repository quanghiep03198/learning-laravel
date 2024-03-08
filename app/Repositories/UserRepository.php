<?php

namespace App\Repositories;

use App\Repositories\Base\BaseAbstractRepository;
use App\Models\User;

class UserRepository extends BaseAbstractRepository
{


    public function __construct(protected User $userModel)
    {
    }


    public function findOneByEmail(string $email)
    {
        return $this->userModel->all()->where('email', '=', $email)->first();
    }

    public function createUser($payload)
    {
        return $this->userModel->create($payload);
    }
}
