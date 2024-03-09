<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    public function __construct(protected ProductServiceInterface $productService)
    {
    }

    public function getPublishedProducts()
    {
        try {
            $publishedProducts = $this->productService->getPublishedProducts();
            return response()->apiResponse([
                "metadata" => $publishedProducts,
                "message" => "ok",
                "status_code" => Response::HTTP_OK
            ]);
        } catch (HttpException $e) {
            return response()->apiResponse([
                "message" => $e->getMessage(),
                "status_code" => $e->getStatusCode()
            ]);
        }
    }

    public function getAllDraftProducts()
    {
        try {
            $draftProducts = $this->productService->getDraftProducts();
            return response()->apiResponse($draftProducts);
        } catch (HttpException $e) {
            return response()->apiResponse([
                "message" => $e->getMessage(), "status_code" => $e->getStatusCode()
            ]);
        }
    }


    public function publishProduct($id)
    {

        $publishedProduct = $this->productService->publishProduct($id);
        return response()->apiResponse($publishedProduct, "Product has been published to store", Response::HTTP_CREATED);
    }

    public function createProduct(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_name' => 'string|required',
                'product_price' => 'integer|required',
                'product_thumbnail' => 'string|required|url',
                'product_category' => 'integer|nullable'
            ]);
            if ($validator->fails())
                throw new BadRequestHttpException($validator->messages()->first());
            $validatedPayload = $validator->validated();
            $newProduct = $this->productService->createProduct($validatedPayload);
            return response()->apiResponse($newProduct, "Created new product", Response::HTTP_CREATED);
        } catch (HttpException $e) {
            return response()->apiResponse([
                "message" => $e->getMessage(),
                "status_code" => $e->getStatusCode()
            ], $e->getMessage(), $e->getStatusCode() ?? 500);
        }
    }

    public function updateProduct($id, Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),

                [
                    "product_name" => "string",
                    "product_price" => "integer", "product_thumbnail" => "string",
                    "product_category" => "string"
                ]
            );
            if ($validator->fails())
                throw new BadRequestHttpException($validator->messages()->first());

            $updatedProduct = $this->productService->updateProduct($id, $validator->validated());

            return response()->apiResponse($updatedProduct, "Product is updated !", Response::HTTP_CREATED);
        } catch (HttpException $e) {
            return response()->apiResponse([
                "message" => $e->getMessage(),
                "status_code" => $e->getStatusCode()
            ], $e->getMessage(), $e->getStatusCode() ?? 500);
        }
    }


    public function deleteProduct($id)
    {
        try {
            $deletedProduct = $this->productService->deleteProduct($id);
            if (!$deletedProduct)
                throw new NotFoundHttpException("Product to delete does not exist");

            return response()->apiResponse($deletedProduct, "Product has been deleted", Response::HTTP_NO_CONTENT);
        } catch (HttpException $e) {
            return response()->apiResponse([
                "message" => $e->getMessage(),
                "status_code" => $e->getStatusCode()
            ], $e->getMessage(), $e->getStatusCode() ?? 500);
        }
    }
}
