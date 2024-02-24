<?php

declare(strict_types=1);

namespace Framework;

use ReflectionClass, ReflectionNamedType;
use Framework\Excepetions\ContainerException;

use function PHPSTORM_META\type;

class Container
{
    private array $defintions = [];

    public function addDefintions(array $newDefinitions)
    {
        $this->defintions = [...$this->defintions, ...$newDefinitions];
    }

    public function resolve(string $className)
    {
        $reflectionClass = new ReflectionClass($className);

        if (!$reflectionClass->isInstantiable()) {
            throw new ContainerException("Class {$className} is not instantiable");
        }

        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return new $className;
        }

        $params = $constructor->getParameters();

        if (count($params) === 0) {
            return new $className;
        }

        $dependencies = [];

        foreach ($params as $param) {
            $name = $param->getName();
            $type = $param->getType();

            if (!$type) {
                throw new ContainerException("Failed to resolve class {$className} because param {$name} is missing a type hint.");
            }

            if (!$type instanceof ReflectionNamedType || $type->isBuiltin()) {
                throw new ContainerException("Failde to resolve class {$className} because invalid param name.");
            }

            $dependencies[] = $this->get($type->getName());
        }
        dd($dependencies);
    }

    public function get(string $id)
    {
        if (!array_key_exists($id, $this->defintions)) {
            throw new ContainerException("Class {$id} does not exist in container.");
        }
        
        $factory = $this->defintions[$id];
        $dependency = $factory();

        return $dependency;
    }
}
