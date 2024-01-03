<?php

declare(strict_types=1);

namespace Framework;

use ReflectionClass;
use Framework\Exceptions\ContainerException;

class Container
{
    private array $definitions = [];

    public function addDefinitions(array $newDefinitions)
    {
        $this->definitions = [...$this->definitions, ...$newDefinitions];

    }

    public function resolve(string $className)
    {
        $reflectionClass = new ReflectionClass($className);

        if (!$reflectionClass->isInstantiable())
        {
            throw new ContainerException("Class ${className} is not instantiable");
        }
        $constructor = $reflectionClass->getConstructor();

        if (!$constructor)
        {
            return new $className;
        }

        $params = $constructor->getParameters();

        if (count($params) === 0)
        {
            return new $className;
        }

        dd($params);
    }
}
