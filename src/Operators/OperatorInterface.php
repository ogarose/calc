<?php
/**
 * @author alex 24.10.18
 */

namespace Calc\Operators;


/**
 * Interface of all supported operations
 * @package Calc\Operators
 * @author alex 24.10.18
 */
interface OperatorInterface
{
    /**
     * @param $leftOperand float|int
     * @param $rightOperand float|int
     * @return float|int
     */
    public function addition($leftOperand, $rightOperand);

    /**
     * @param $leftOperand float|int
     * @param $rightOperand float|int
     * @return float|int
     */
    public function subtraction($leftOperand, $rightOperand);

    /**
     * @param $leftOperand float|int
     * @param $rightOperand float|int
     * @return float|int
     */
    public function multiplication($leftOperand, $rightOperand);

    /**
     * @param $leftOperand float|int
     * @param $rightOperand float|int
     * @return float|int
     * @throws DivisionByZeroException
     */
    public function division($leftOperand, $rightOperand);
}