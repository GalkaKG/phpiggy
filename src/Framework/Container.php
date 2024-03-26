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
            throw new ContainerException("Class with ${className} is not instantiable");
        }

        dd($reflectionClass);
    }
}
