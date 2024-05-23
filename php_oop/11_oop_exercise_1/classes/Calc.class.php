<?php

declare(strict_types=1);

class Calc
{
    public string $operator;
    public int $num1;
    public int $num2;

    public function __construct(string $operator, int $num1, int $num2)
    {
        $this->operator = $operator;
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    public function calculator()
    {
        switch ($this->operator) {
            case 'add':
                return $this->num1 + $this->num2;

            case 'sub':
                return $this->num1 - $this->num2;

            case 'div':
                return $this->num1 / $this->num2;

            case 'mul':
                return $this->num1 * $this->num2;

            default:
                echo "Error!";
        }
    }
}
