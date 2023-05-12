<?php

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

final class ProductIdExistsException extends ValidationException
{

    protected $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} is not found. ',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} can not be found. ',
        ],
    ];
}
