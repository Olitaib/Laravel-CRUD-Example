<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\DataStore\CategoryDataStore;
use App\DTO\Category\DataStoreCategoryRequest;

class CategoryController extends Controller
{

    public function __construct(private CategoryDataStore $categoryDataStore)
    {

    }

    public function create(Request $request): JsonResponse
    {
        return response()->json($this->categoryDataStore->create(new DataStoreCategoryRequest(
            name: $request['name'],
            description: $request['description']
        )));
    }

    public function update(Request $request): JsonResponse
    {
        return response()->json($this->categoryDataStore->update(new DataStoreCategoryRequest(
            id: $request['id'],
            name: $request['name'],
            description: $request['description']
        )));
    }

    public function get(Request $request): JsonResponse
    {
        return response()->json($this->categoryDataStore->get(new DataStoreCategoryRequest(
            id: $request['id']
        )));
    }

    public function getAll(): JsonResponse
    {
        return response()->json($this->categoryDataStore->getAll());
    }

    public function delete(Request $request): JsonResponse
    {
        return response()->json($this->categoryDataStore->delete(new DataStoreCategoryRequest(
            id: $request['id']
        )));
    }
}
