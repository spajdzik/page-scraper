<?php

namespace App\Service\Calculator;

class Calculator implements CalculatorInterface
{
    public function add(float $a, float $b): float
    {
        return round($a + $b, 2);
    }

    public function subtract(float $a, float $b): float
    {
        return $a - $b;
    }

    public function multiply(float $a, float $b): float
    {
        return $a * $b;
    }

    public function divide(float $a, float $b): float
    {
        return $a / $b;
    }
}