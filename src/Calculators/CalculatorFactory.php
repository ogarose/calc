<?php
/**
 * @author alex 24.10.18
 */

namespace Calc\Calculators;


/**
 * Parent factory class for initialise calculator
 * @package Calc\Calculators
 * @author alex 24.10.18
 */
abstract class CalculatorFactory implements CalculatorInterface
{

    abstract protected function getCalculator(): CalculatorInterface;

    public function calculate(string $inputExpression)
    {
        $calculator = $this->getCalculator();

        return $calculator->calculate($inputExpression);
    }
}