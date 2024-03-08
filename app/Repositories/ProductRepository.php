<?php

namespace App\Repositories;

use App\Repositories\Base\BaseAbstractRepository;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository extends BaseAbstractRepository implements ProductRepositoryInterface
{
    public function __construct(protected Product $productModel)
    {
    }

    public function createOne($payload)
    {
        return  $this->productModel->create($payload);
    }

    public function updateOne($id,  $payload)
    {
        return $this->productModel->all()->where('id', '=', $id)->updateOne($payload);
    }

    public function deleteOne($id): mixed
    {
        return $this->productModel->where('id', '=', $id)->delete();
    }

    public function findWithFilter($filterQuery = []): mixed
    {
        return $this->productModel->whereRaw()->get();
    }

    public function findOne($filterQuery): mixed
    {
        return $this->productModel->whereRaw($filterQuery)->first();
    }

    public function findOneBySlug(string $slug): mixed
    {
        return $this->productModel->whereRaw('slug = ?', [$slug])->get();
    }
}