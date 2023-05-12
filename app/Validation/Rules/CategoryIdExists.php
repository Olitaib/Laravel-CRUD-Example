<?php

namespace App\Validation\Rules;

use App\Models\Category;
use Respect\Validation\Rules\AbstractRule;

final class CategoryIdExists extends AbstractRule
{

    public function validate($input): bool
    {
        if (Category::where('id', $input)->first()) {
            return true;
        }

        return false;
    }
}
