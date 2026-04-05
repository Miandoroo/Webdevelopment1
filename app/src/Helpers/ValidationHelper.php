<?php

declare(strict_types=1);

namespace App\Helpers;

final class ValidationHelper
{
    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}
