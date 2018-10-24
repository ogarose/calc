<?php
/**
 * @author alex 24.10.18
 */

namespace Calc\Operators;


use Calc\Exceptions\DivisionByZeroException;

/**
 * Class for realising not precision math operations
 * @package Calc\Operators
 * @author alex 24.10.18
 */
class SimpleOperator implements OperatorInterface
{

    public function addition($leftOperand, $rightOperand)
    {
        return $leftOperand + $rightOperand;
    }

    public function subtraction($leftOperand, $rightOperand)
    {
        return $leftOperand - $rightOperand;
    }

    public function multiplication($leftOperand, $rightOperand)
    {
        return $leftOperand * $rightOperand;
    }

    public function division($leftOperand, $rightOperand)
    {
        if ($rightOperand == 0) {
            throw new DivisionByZeroException('Division by zero is undefined');
        }

        return $leftOperand / $rightOperand;
    }
}