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

    public function updateOneById($id,  $payload)
    {
        $productToUpdate  = $this->productModel->find($id);
        $productToUpdate->update($payload);

        return $productToUpdate;
    }

    public function deleteOneById($id)
    {
        return $this->productModel->where('id', '=', $id)->delete();
    }

    public function findWithFilter($filterQuery)
    {
        return $this->productModel->whereRaw($filterQuery)->get();
    }

    public function findOneById($id)
    {
        return $this->productModel->find($id);
    }
    
    public function findOne($filterQuery)
    {
        return $this->productModel->whereRaw($filterQuery)->first();
    }

    public function findOneBySlug($slug)
    {
        return $this->productModel->whereRaw('slug = ?', [$slug])->get();
    }
}