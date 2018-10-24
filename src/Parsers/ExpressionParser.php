<?php
/**
 * @author alex 23.10.18
 */

namespace Calc\Parsers;


use Calc\Exceptions\ExpressionParseException;

class ExpressionParser implements ExpressionParserInterface
{
    /**
     * @param string $inputExpression
     * @return ExpressionRecord
     * @throws ExpressionParseException
     */
    public function parse(string $inputExpression): ExpressionRecord
    {
        if (preg_match('/^(.+?)(?:\s*)([\+\-\*\/]{1})(?:\s*)(.+?)$/', $inputExpression, $expressionParts)) {
            list(, $leftOperand, $operator, $rightOperand) = $expressionParts;
            $leftOperand = trim($leftOperand);
            $rightOperand = trim($rightOperand);
        } else {
            throw new ExpressionParseException(sprintf("Can't parse expression %s", $inputExpression));
        }

        if ($this->existNotNumeric($leftOperand, $rightOperand)) {
            throw new ExpressionParseException('Some operands are not number');
        }

        $expression = new ExpressionRecord();
        $expression->operator = $operator;
        $expression->leftOperand = $leftOperand;
        $expression->rightOperand = $rightOperand;

        return $expression;
    }

    /**
     * check does't one of input variable is not numeric
     * @param mixed ...$numbers
     * @return bool
     */
    private function existNotNumeric(...$numbers): bool
    {
        foreach ($numbers as $number) {
            if (is_numeric($number) === false) {
                return true;
            }
        }

        return false;
    }
}