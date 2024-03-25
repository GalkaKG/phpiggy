<?php

declare(strict_types=1);

namespace Framework;

class App 
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }
    public function run()
    {
        echo "Application is running";
    }

    public function get(string $path, array $controller)
    {
        $this->router->add('GET', $path, $controller);
    }
}