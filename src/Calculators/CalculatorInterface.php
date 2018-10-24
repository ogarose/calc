<?php

namespace Calc\Calculators;


/**
 * Interface CalculatorInterface
 * @package Calc\Calculators
 * @author alex 24.10.18
 */
interface CalculatorInterface
{
    public function calculate(string $inputExpression);
}