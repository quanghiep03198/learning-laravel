<?php

namespace App\Repositories\Base;

abstract class BaseAbstractRepository
{


    public function __construct(protected $model)
    {
        $this->model = $model;
    }
}
