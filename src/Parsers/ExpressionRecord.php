<?php

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
