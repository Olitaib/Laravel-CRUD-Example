<?php

namespace App\DataStore;

use App\DTO\Category\DataStoreCategoryRequest as CategoryDTO;
use App\DTO\Category\DataStoreCategoryResponse;
use App\Repositories\CategorySqlRepository;
use App\Validation\Validation;

class CategoryDataStore
{

    public function __construct(private CategorySqlRepository $categorySqlRepository, private Validation $validation)
    {

    }

    public function create(CategoryDTO $request): DataStoreCategoryResponse
    {
        $this->validation->validationCategory($request);
        if ($this->validation->errors) {
            return new DataStoreCategoryResponse(messages: $this->validation->errors);
        }

        return $this->categorySqlRepository->create($request);
    }

    public function update(CategoryDTO $request): DataStoreCategoryResponse
    {
        $this->validation->validationCategory($request);
        if ($this->validation->errors) {
            return new DataStoreCategoryResponse(messages: $this->validation->errors);
        }

        return $this->categorySqlRepository->update($request);
    }

    public function get(CategoryDTO $request): DataStoreCategoryResponse
    {
        $this->validation->validationCategory($request);
        if ($this->validation->errors) {
            return new DataStoreCategoryResponse(messages: $this->validation->errors);
        }

        return $this->categorySqlRepository->get($request);
    }

    public function getAll(): array
    {
        return $this->categorySqlRepository->getAll();
    }

    public function delete(CategoryDTO $request): DataStoreCategoryResponse
    {
        $this->validation->validationCategory($request);
        if ($this->validation->errors) {
            return new DataStoreCategoryResponse(messages: $this->validation->errors);
        }

        return $this->categorySqlRepository->delete($request);
    }
}
