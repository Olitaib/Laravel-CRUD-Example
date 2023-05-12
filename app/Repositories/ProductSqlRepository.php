<?php

namespace App\Repositories;

use App\DTO\Product\DataStoreProductRequest as ProductDTO;
use App\DTO\Product\DataStoreProductResponse;
use App\Models\Product;

class ProductSqlRepository
{

    public function create(ProductDTO $request): DataStoreProductResponse
    {
        $product = Product::create($request->toArray());

        return new DataStoreProductResponse($product);
    }

    public function update(ProductDTO $request): DataStoreProductResponse
    {
        $product = Product::find($request->getId());
        $product->update(array_filter($request->toArray()));

        return new DataStoreProductResponse($product);
    }

    public function get(ProductDTO $request): DataStoreProductResponse
    {
        $product = Product::find($request->getId());

        return new DataStoreProductResponse($product);
    }

    public function getAll(): array
    {
        $products = Product::all();
        $return = [];

        foreach ($products as $product) {
            $return[] = new DataStoreProductResponse($product);
        }

        return $return;
    }

    public function delete(ProductDTO $request): DataStoreProductResponse
    {
        $product = Product::find($request->getId());
        $product->delete();

        return new DataStoreProductResponse(messages: ['Product has been deleted']);
    }
}
