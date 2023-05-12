<?php

namespace App\Validation\Rules;

use App\Models\Product;
use Respect\Validation\Rules\AbstractRule;

final class ProductIdExists extends AbstractRule
{

    public function validate($input): bool
    {
        if (Product::find($input)) {
            return true;
        }

        return false;
    }
}
