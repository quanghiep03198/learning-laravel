<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    public function __construct(protected ProductRepositoryInterface $productRepository)
    {
    }

    public function createProduct(array $payload): mixed
    {
        return $this->productRepository->createOne($payload);
    }

    public function updateProduct(int $id, mixed $payload): mixed
    {
        return $this->productRepository->updateOne($id, $payload);
    }

    public function getProducts(mixed $filterQuery): mixed
    {
        return $this->productRepository->findWithFilter($filterQuery);
    }

    public function getProductById(int $id): mixed
    {
        return $this->productRepository->findOne($id);
    }

    public function getProductBySlug(string $slug): mixed
    {
        return $this->productRepository->findOneBySlug($slug);
    }

    public function deleteProduct(int $id): mixed
    {
        return $this->productRepository->deleteOne($id);
    }

    public function getPublishedProducts()
    {
        return $this->productRepository->findWithFilter('is_published = true');
    }
}
