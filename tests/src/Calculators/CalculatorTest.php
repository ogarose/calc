<?php

namespace Test\Unit;

use Calc\Calculators\Calculator;
use Calc\Exceptions\DivisionByZeroException;
use Calc\Exceptions\NotSupportedOperatorException;
use Calc\Operators\SimpleOperator;
use Calc\Parsers\ExpressionParser;
use Calc\Parsers\ExpressionParserInterface;
use Calc\Parsers\ExpressionRecord;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /**
     * @dataProvider dataForCalculateTest
     */
    public function testCalculate($expression, $expectedResult)
    {
        $calculator = new Calculator(new ExpressionParser(), new SimpleOperator());

        $result = $calculator->calculate($expression);

        $this->assertEquals($result, $expectedResult);
    }

    public function dataForCalculateTest(): array
    {
        return [
            'addition'         => ['1+1', '2'],
            'subtraction'      => [' 10-3 ', '7'],
            'multiplication'   => ['255*3', '765'],
            'division'         => ['300 / 3', '100'],
            'add negative'     => ['-5 + 14', '9'],
            'negative result'  => ['-5 - 14', '-19'],
            'divivision float' => ['1.058 / 4 ', '0.2645'],
        ];
    }

    public function testCalculateDivisionBeZero()
    {
        $calculator = new Calculator(new ExpressionParser(), new SimpleOperator());

        $this->expectException(DivisionByZeroException::class);

        $calculator->calculate('5/0');
    }

    public function testCalculateWithNotSupportedOperator()
    {
        //given input expression looks like '10^85' and has not supported operator '^'
        $expression = new ExpressionRecord();
        $expression->operator = '^';
        $expression->leftOperand = '10';
        $expression->rightOperand = '85';

        //when parser returns expression with operator '^'
        $parser = $this->createMock(ExpressionParserInterface::class);
        $parser->method('parse')
            ->willReturn($expression);

        $calculator = new Calculator($parser, new SimpleOperator());

        //then during calculation NotSupportedOperator exception must be thrown
        $this->expectException(NotSupportedOperatorException::class);

        $calculator->calculate('10^85');
    }
}
