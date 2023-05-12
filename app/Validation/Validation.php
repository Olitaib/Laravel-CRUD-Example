<?php

namespace App\Validation;

use App\DTO\Category\DataStoreCategoryRequest as CategoryDTO;
use App\DTO\Product\DataStoreProductRequest as ProductDTO;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Factory;
use Respect\Validation\Validator as V;

class Validation
{

    public ?array $errors = null;

    public function __construct()
    {
        Factory::setDefaultInstance(
            (new Factory())
                ->withRuleNamespace('App\Validation\Rules')
                ->withExceptionNamespace('App\Validation\Exceptions')
        );
    }

    public function validationCategory(CategoryDTO $request): void
    {
        $validation = v::attribute('id', v::optional(v::intType()->categoryIdExists()))
            ->attribute('name', v::optional(v::stringType()))
            ->attribute('description', v::optional(v::stringType()));
        try {
            $validation->assert($request);
        } catch (NestedValidationException $exception) {
            $this->errors = $exception->getMessages();
        }
    }

    public function validationProduct(ProductDTO $request): void
    {
        $validation = v::attribute('id', v::optional(v::intType()->productIdExists()))
            ->attribute('category_id', v::optional(v::intType()->categoryIdExists()))
            ->attribute('title', v::optional(v::stringType()))
            ->attribute('price', v::optional(v::floatType()))
            ->attribute('description', v::optional(v::stringType()));
        try {
            $validation->assert($request);
        } catch (NestedValidationException $exception) {
            $this->errors = $exception->getMessages();
        }
    }
}
