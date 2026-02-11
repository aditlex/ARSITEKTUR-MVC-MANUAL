<?php

namespace App;

class Router
{
    private array $routes = [];
    private array $dynamicRoutes = [];

    public function get(string $path, callable|array $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post(string $path, callable|array $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    private function addRoute(string $httpMethod, string $path, callable|array $handler): void
    {
        if (str_contains($path, '{')) {
            $pattern = preg_replace('#\{(\w+)\}#', '(?P<$1>[^/]+)', $path);
            $this->dynamicRoutes[$httpMethod]["#^$pattern$#"] = $handler;
        } else {
            $this->routes[$httpMethod][$path] = $handler;
        }
    }

    public function resolve(): mixed
    {
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->routes[$httpMethod][$uri])) {
            return $this->dispatch($this->routes[$httpMethod][$uri]);
        }

        foreach ($this->dynamicRoutes[$httpMethod] ?? [] as $pattern => $handler) {
            if (preg_match($pattern, $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                return $this->dispatch($handler, $params);
            }
        }

        http_response_code(404);
        return '404 Not Found';
    }

    private function dispatch(callable|array $handler, array $params = []): mixed
    {
        if (is_array($handler)) {
            [$class, $method] = $handler;

            if (!class_exists($class)) {
                throw new \RuntimeException("Controller not found");
            }

            return (new $class())->$method($params);
        }

        return $handler($params);
    }
}
