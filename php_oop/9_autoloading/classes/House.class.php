<?php

declare(strict_types=1);

class House
{
    public string $street_name;
    public int $street_number;

    public function __construct(string $street_name, int $street_number)
    {
        $this->street_name = $street_name;
        $this->street_number = $street_number;
    }

    public function getAddress(): string
    {
        return "$this->street_name $this->street_number";
    }
}
