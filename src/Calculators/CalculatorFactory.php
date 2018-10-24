<?php

namespace Calc\Calculators;


/**
 * Parent factory class for initialise calculator
 * @package Calc\Calculators
 * @author alex 24.10.18
 */
abstract class CalculatorFactory implements CalculatorInterface
{

    abstract protected function getCalculator(): CalculatorInterface;

    /**
     * Run expression calculation
     * @param string $inputExpression
     * @return float|int
     */
    public function calculate(string $inputExpression)
    {
        $calculator = $this->getCalculator();

        return $calculator->calculate($inputExpression);
    }
}