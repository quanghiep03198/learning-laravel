<?php

namespace App\Services\Interfaces;

interface ProductServiceInterface
{
    public function createProduct(array $payload): mixed;
    public function updateProduct(int $id, mixed $payload): mixed;
    public function deleteProduct(int $id): mixed;
    public function getProducts(mixed $filterQuery): mixed;
    public function getProductById(int $id): mixed;
    public function getProductBySlug(string $slug): mixed;
    public function getPublishedProducts(): mixed;
}
