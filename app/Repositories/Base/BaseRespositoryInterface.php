<?php

namespace App\Repositories\Base;

interface BaseRespositoryInterface

{
    public function createOne($payload);
    public function updateOneById($id, $update);
    public function deleteOneById($id);
    public function findOneById($id);
    public function findOne($filterQuery);
    public function findWithFilter($filterQuery);
}
