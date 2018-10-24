<?php
/**
 * User: alex
 * Date: 21.10.18
 * Time: 14.59
 */

namespace Calc\Calculators;


use Calc\Exceptions\NotSupportedOperatorException;
use Calc\Operators\OperatorInterface;
use Calc\Parsers\ExpressionParserInterface;

/**
 * Class Calculator
 * @package Calculator
 */
class Calculator implements CalculatorInterface
{
    /**
     * @var ExpressionParserInterface
     */
    private $expressionParser;
    /**
     * @var OperatorInterface
     */
    private $operator;

    /**
     * Calculator constructor.
     * @param ExpressionParserInterface $expressionParser
     */
    public function __construct(ExpressionParserInterface $expressionParser, OperatorInterface $operator)
    {
        $this->expressionParser = $expressionParser;
        $this->operator = $operator;
    }

    /**
     * @param string $inputExpression
     * @return float|int
     * @throws NotSupportedOperatorException
     */
    public function calculate(string $inputExpression)
    {
        $inputExpression = trim($inputExpression);

        $expression = $this->expressionParser->parse($inputExpression);

        $result = 0;
        switch ($expression->operator) {
            case '+':
                $result = $this->operator->addition($expression->leftOperand, $expression->rightOperand);
                break;
            case '-':
                $result = $this->operator->subtraction($expression->leftOperand, $expression->rightOperand);
                break;
            case '*':
                $result = $this->operator->multiplication($expression->leftOperand, $expression->rightOperand);
                break;
            case '/':
                $result = $this->operator->division($expression->leftOperand, $expression->rightOperand);
                break;
            default:
                throw new NotSupportedOperatorException(sprintf('The operator "%s" is not supported ',
                    $expression->operator));
        }

        return $result;
    }
}
