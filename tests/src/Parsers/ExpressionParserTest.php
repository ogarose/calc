<?php
/**
 * @author alex 23.10.18
 */

namespace Test\Unit\Parsers;

use Calc\Exceptions\ExpressionParseException;
use Calc\Parsers\ExpressionParser;
use Calc\Parsers\ExpressionRecord;
use PHPUnit\Framework\TestCase;

class ExpressionParserTest extends TestCase
{
    /**
     * @dataProvider dataForTestParse
     */
    public function testParse($expression, $leftOperand, $operator, $rightOperand)
    {
        $parser = new ExpressionParser();

        $expressionRecord = $parser->parse($expression);

        $expectedExpressionRecord = new ExpressionRecord();
        $expectedExpressionRecord->leftOperand = $leftOperand;
        $expectedExpressionRecord->operator = $operator;
        $expectedExpressionRecord->rightOperand = $rightOperand;

        $this->assertEquals($expectedExpressionRecord, $expressionRecord);
    }

    public function dataForTestParse(): array
    {
        return [
            'addition'         => ['1+1', '1', '+', '1'],
            'subtraction'      => [' 10-3 ', '10', '-', '3'],
            'multiplication'   => ['255*3', '255', '*', '3'],
            'division'         => ['300 / 3', '300', '/', '3'],
            'add negative'     => ['-5 + 14', '-5', '+', '14'],
            'negative result'  => ['-5 - 14', '-5', '-', '14'],
            'divivision float' => ['1.058 / 4 ', '1.058', '/', '4'],
        ];
    }

    public function testParseWhenInputInWrongFormat()
    {
        $parser = new ExpressionParser();

        $this->expectException(ExpressionParseException::class);

        $parser->parse('tytyttaoao');
    }

    /**
     * @dataProvider dataForTestParseWhenSomeOperandsNotNumber
     */
    public function testParseWhenSomeOperandsNotNumber(string $expression)
    {
        $parser = new ExpressionParser();

        $this->expectException(ExpressionParseException::class);

        $parser->parse($expression);
    }

    public function dataForTestParseWhenSomeOperandsNotNumber(): array
    {
        return [
            ['tyt+33'],
            ['tyt+3s3'],
            ['54+3s3'],
        ];
    }
}
