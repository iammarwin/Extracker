<?php

declare(strict_types=1);

namespace Framework;

class App
{
    private Router $router;
    private Container $container;

    public function __construct(string $containerDefintionsPath = null)
    {
        $this->router = new Router();
        $this->container = new Container();

        if ($containerDefintionsPath) {
            $containerDefintions = include $containerDefintionsPath;
            $this->container->addDefintions($containerDefintions);
        }
    }

    public function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->router->dispatsh($path, $method, $this->container);
    }

    public function get(string $path, array $conroller): App
    {
        $this->router->add('GET', $path, $conroller);
        return $this;
    }

    public function post(string $path, array $conroller): App
    {
        $this->router->add('POST', $path, $conroller);
        return $this;
    }

    public function addMiddleware(string $middleware)
    {
        $this->router->addMiddleware($middleware);
    }

    public function add(string $middleware)
    {
        $this->router->addRouteMiddleware($middleware);
    }
}
