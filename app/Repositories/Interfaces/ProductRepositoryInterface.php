<?php

namespace App\Repositories\Interfaces;

use App\Repositories\Base\IBaseRepository;

interface ProductRepositoryInterface extends IBaseRepository
{
    public function findOneBySlug(string $slug): mixed;
}
