<?php

namespace App\Repositories\Interfaces;

use App\Repositories\Base\IBaseRepository;

interface IUserRepository extends IBaseRepository
{
    public function createUser($payload);
    public function findOneByEmail(string $email);
}
