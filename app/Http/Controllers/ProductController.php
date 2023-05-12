<?php

namespace App\Http\Controllers;

use App\DataStore\ProductDataStore;
use App\DTO\Product\DataStoreProductRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(private ProductDataStore $productDataStore)
    {

    }

    public function create(Request $request): JsonResponse
    {
        return response()->json($this->productDataStore->create(new DataStoreProductRequest(
            category_id: $request['category_id'],
            title: $request['title'],
            price: $request['price'],
            description: $request['description']
        )));
    }

    public function update(Request $request): JsonResponse
    {
        return response()->json($this->productDataStore->update(new DataStoreProductRequest(
            id: $request['id'],
            category_id: $request['category_id'],
            title: $request['title'],
            price: $request['price'],
            description: $request['description']
        )));
    }

    public function get(Request $request): JsonResponse
    {
        return response()->json($this->productDataStore->get(new DataStoreProductRequest(
            id: $request['id']
        )));
    }

    public function getAll(): JsonResponse
    {
        return response()->json($this->productDataStore->getAll());
    }

    public function delete(Request $request): JsonResponse
    {
        return response()->json($this->productDataStore->delete(new DataStoreProductRequest(
            id: $request['id']
        )));
    }
}
