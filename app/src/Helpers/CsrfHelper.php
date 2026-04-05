<?php

declare(strict_types=1);

namespace App\Helpers;

final class CsrfHelper
{
    public static function token(): string
    {
        if (!isset($_SESSION['_csrf'])) {
            $_SESSION['_csrf'] = bin2hex(random_bytes(16));
        }

        return $_SESSION['_csrf'];
    }
}
