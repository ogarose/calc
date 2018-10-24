<?php
/**
 * @author alex 23.10.18
 */

namespace Calc\Parsers;


interface ExpressionParserInterface
{
    /**
     * return parsed expression
     * @param string $inputExpression
     * @return ExpressionRecord
     * @author alex 23.10.18
     */
    public function parse(string $inputExpression): ExpressionRecord;
}