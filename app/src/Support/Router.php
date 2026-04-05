<?php

declare(strict_types=1);

namespace App\Support;

final class Router
{
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->map('GET', $path, $handler);
    }

    public function post(string $path, callable $handler): void
    {
        $this->map('POST', $path, $handler);
    }

    public function delete(string $path, callable $handler): void
    {
        $this->map('DELETE', $path, $handler);
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';

        foreach ($this->routes[$method] ?? [] as $route) {
            $pattern = preg_replace('#\{[a-zA-Z_]+\}#', '([^/]+)', $route['path']);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $path, $matches) === 1) {
                array_shift($matches);
                call_user_func_array($route['handler'], $matches);
                return;
            }
        }

        http_response_code(404);
        echo 'Page not found';
    }

    private function map(string $method, string $path, callable $handler): void
    {
        $this->routes[$method][] = [
            'path' => $path,
            'handler' => $handler,
        ];
    }
}
