<?php

namespace App\DataStore;

use App\DTO\Product\DataStoreProductRequest as ProductDTO;
use App\DTO\Product\DataStoreProductResponse;
use App\Repositories\ProductSqlRepository;
use App\Validation\Validation;

class ProductDataStore
{

    public function __construct(private ProductSqlRepository $productSqlRepository, private Validation $validation)
    {

    }

    public function create(ProductDTO $request): DataStoreProductResponse
    {
        $this->validation->validationProduct($request);
        if ($this->validation->errors) {
            return new DataStoreProductResponse(messages: $this->validation->errors);
        }

        return $this->productSqlRepository->create($request);
    }

    public function update(ProductDTO $request): DataStoreProductResponse
    {
        $this->validation->validationProduct($request);
        if ($this->validation->errors) {
            return new DataStoreProductResponse(messages: $this->validation->errors);
        }

        return $this->productSqlRepository->update($request);
    }

    public function get(ProductDTO $request): DataStoreProductResponse
    {
        $this->validation->validationProduct($request);
        if ($this->validation->errors) {
            return new DataStoreProductResponse(messages: $this->validation->errors);
        }

        return $this->productSqlRepository->get($request);
    }

    public function getAll(): array
    {
        return $this->productSqlRepository->getAll();
    }

    public function delete(ProductDTO $request): DataStoreProductResponse
    {
        $this->validation->validationProduct($request);
        if ($this->validation->errors) {
            return new DataStoreProductResponse(messages: $this->validation->errors);
        }

        return $this->productSqlRepository->delete($request);
    }
}
