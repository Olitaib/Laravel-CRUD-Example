<?php

namespace App\Repositories;

use App\DTO\Category\DataStoreCategoryRequest as CategoryDTO;
use App\DTO\Category\DataStoreCategoryResponse;
use App\Models\Category;


class CategorySqlRepository
{

    public function create(CategoryDTO $request): DataStoreCategoryResponse
    {
        $category = Category::create($request->toArray());

        return new DataStoreCategoryResponse($category);
    }

    public function update(CategoryDTO $request): DataStoreCategoryResponse
    {
        $category = Category::find($request->getId());
        $category->update($request->toArray());

        return new DataStoreCategoryResponse($category);
    }

    public function get(CategoryDTO $request): DataStoreCategoryResponse
    {
        $category = Category::find($request->getId());

        return new DataStoreCategoryResponse($category);
    }

    public function getAll(): array
    {
        $categories = Category::all();
        $return = [];

        foreach ($categories as $category) {
            $return[] = new DataStoreCategoryResponse($category);
        }

        return $return;
    }

    public function delete(CategoryDTO $request): DataStoreCategoryResponse
    {
        $category = Category::find($request->getId());
        $category->delete();

        return new DataStoreCategoryResponse(messages: ["Category has been deleted"]);
    }
}
