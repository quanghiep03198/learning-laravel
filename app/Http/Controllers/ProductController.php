<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ProductServiceInterface;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ProductController extends Controller
{


    public function __construct(protected ProductServiceInterface $productService)
    {
    }

    public function createProduct(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'product_name' => 'string|required',
            'product_price' => 'integer|required|min=0',
            'product_thumbnail' => 'string|required|url',
            'product_category' => 'integer|nullable'

        ]);


        if ($validator->fails())
            throw new BadRequestHttpException($validator->messages()->first());


        $validatedPayload = $validator->validated();

        $newProduct = $this->productService->createProduct($validatedPayload);

        return response()->json(["metadata" => $newProduct, "timestamps" => date("Y-m-d H:i:s")]);
    }


    public function getPublishedProducts()
    {
        $publishedProducts = $this->productService->getPublishedProducts();
    }
}
