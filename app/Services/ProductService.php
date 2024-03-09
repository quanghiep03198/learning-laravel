<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    public function __construct(protected ProductRepositoryInterface $productRepository)
    {
    }

    public function createProduct($payload)
    {
        return $this->productRepository->createOne($payload);
    }

    public function updateProduct($id,  $payload)
    {
        return $this->productRepository->updateOneById($id, $payload);
    }

    public function publishProduct($id)
    {
        return $this->productRepository->updateOneById($id, ["is_published" => true, "is_draft" => false]);
    }
    public function getProducts($filterQuery)
    {
        return $this->productRepository->findWithFilter($filterQuery);
    }

    public function getProductById($id)
    {
        return $this->productRepository->findOne($id);
    }

    public function getProductBySlug($slug)
    {
        return $this->productRepository->findOneBySlug($slug);
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->deleteOneById($id);
    }

    public function getPublishedProducts()
    {
        return $this->productRepository->findWithFilter('is_published = 1');
    }

    public function getDraftProducts()
    {
        return $this->productRepository->findWithFilter('is_draft = 1');
    }
}
