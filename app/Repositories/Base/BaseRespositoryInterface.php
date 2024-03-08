<?php

namespace App\Repositories\Base;

interface IBaseRepository
{
    public function createOne($payload): mixed;
    public function updateOne($id, $update): mixed;
    public function deleteOne($id): mixed;
    public function findOne($filterQuery): mixed;
    public function findWithFilter($filterQuery): mixed;
}
