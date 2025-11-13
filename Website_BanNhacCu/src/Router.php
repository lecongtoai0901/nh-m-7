<?php
namespace App;

class Router
{
    private $routes = [];

    public function add($method, $path, $callback)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'callback' => $callback
        ];
    }

    public function dispatch($method, $path)
    {
        // Remove query string
        $path = parse_url($path, PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] !== strtoupper($method)) {
                continue;
            }

            // Simple pattern matching (e.g., /product/:id)
            $pattern = preg_replace('/:([a-zA-Z0-9_]+)/', '(?P<$1>[a-zA-Z0-9_-]+)', $route['path']);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $path, $matches)) {
                // Extract named parameters
                $params = [];
                foreach ($matches as $key => $value) {
                    if (!is_numeric($key)) {
                        $params[$key] = $value;
                    }
                }

                return call_user_func($route['callback'], $params);
            }
        }

        // 404
        http_response_code(404);
        return '<h1>404 - Not Found</h1>';
    }
}
