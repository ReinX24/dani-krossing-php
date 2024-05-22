<?php

declare(strict_types=1);

namespace Person;

class Person
{
    public string $name;
    public int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getPerson(): string
    {
        return "$this->name is $this->age years old!";
    }
}
