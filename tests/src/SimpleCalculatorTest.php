<?php
/**
 * @author alex 24.10.18
 */

namespace Test\Unit;

use Calc\SimpleCalculator;
use PHPUnit\Framework\TestCase;

class SimpleCalculatorTest extends TestCase
{
    public function testCalculate()
    {
        $calculator = new SimpleCalculator();

        $result = $calculator->calculate('5+85');

        $this->assertEquals(90, $result);
    }
}
