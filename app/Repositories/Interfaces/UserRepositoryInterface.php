<?php

namespace App\Repositories\Interfaces;

use App\Repositories\Base\BaseRespositoryInterface;

interface UserRepositoryInterface extends BaseRespositoryInterface
{
    public function createUser($payload);
    public function findOneByEmail(string $email);
}
