<?php

namespace App\Repositories\Interfaces;

use App\Repositories\Base\BaseRespositoryInterface;

interface ProductRepositoryInterface extends BaseRespositoryInterface
{
    public function findOneBySlug($slug);
}
