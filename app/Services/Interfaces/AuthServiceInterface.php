<?php

namespace App\Services\Interfaces;

interface AuthServiceInterface
{
    public function verifyUser($payload);
}
