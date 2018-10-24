<?php
/**
 * @author alex
 */

namespace Calc;


use Calc\Calculators\Calculator;
use Calc\Calculators\CalculatorFactory;
use Calc\Calculators\CalculatorInterface;
use Calc\Operators\SimpleOperator;
use Calc\Parsers\ExpressionParser;

/**
 * Factory for calculator without precision
 * @package Calc
 * @author alex 24.10.18
 */
class SimpleCalculator extends CalculatorFactory
{

    /**
     * return Calculator without Precision
     * @return CalculatorInterface
     * @author alex 24.10.18
     */
    protected function getCalculator(): CalculatorInterface
    {
        $parser = new ExpressionParser();
        $operator = new SimpleOperator();

        return new Calculator($parser, $operator);
    }
}