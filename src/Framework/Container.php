<?php

declare(strict_types=1);

namespace Framework;

class Container
{
    private array $defintions = [];

    public function addDefintions(array $newDefinitions)
    {
        $this->defintions = [...$this->defintions, ...$newDefinitions];
        dd($newDefinitions);
    }
}
