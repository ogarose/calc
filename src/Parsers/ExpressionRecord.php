<?php
/**
 * User: alex
 * Date: 21.10.18
 * Time: 15.23
 */

namespace Calc\Parsers;

/**
 * Active record which represents expression in parsed view
 * @package Calc\Parsers
 * @author alex 24.10.18
 */
class ExpressionRecord
{
    public $operator;

    public $leftOperand;

    public $rightOperand;
}
