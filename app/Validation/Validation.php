<?php

namespace App\Validation;

use App\DTO\Category\DataStoreCategoryRequest as CategoryDTO;
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
}
