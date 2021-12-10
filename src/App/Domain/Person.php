<?php

namespace App\Domain;

class Person
{
    private string $name;
    private Age $age;

    public function __construct(string $name, Age $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function age(): Age
    {
        return $this->age;
    }
}
