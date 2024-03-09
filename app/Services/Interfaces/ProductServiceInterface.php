<?php

namespace App\Services\Interfaces;

interface ProductServiceInterface
{
    public function createProduct($payload);
    public function updateProduct($id, $payload);
    public function deleteProduct($id);
    public function getProducts($filterQuery);
    public function getProductById($id);
    public function getProductBySlug($slug);
    public function getPublishedProducts();
    public function getDraftProducts();
    public function publishProduct($id);
}
