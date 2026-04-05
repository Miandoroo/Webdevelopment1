<?php

declare(strict_types=1);

namespace App\Support;

final class View
{
    public static function render(string $template, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        $basePath = dirname(__DIR__) . '/Views/';
        require $basePath . 'shared/header.php';
        require $basePath . $template . '.php';
        require $basePath . 'shared/footer.php';
    }
}
