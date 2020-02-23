<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use RpnCalculator\RpnCalculator;
use RpnCalculator\Exceptions\EvaluateException;
use RpnCalculator\Exceptions\UnexpectedItemException;

final class RpnCalculatorTest extends TestCase
{
    public function testOutputIsAString()
    {
        $this->assertIsString(RpnCalculator::factory()->process('2 3 +'));
    }

    public function testCanAdd()
    {
        $this->assertEquals(
            '5',
            RpnCalculator::factory()->process('2 3 +')
        );
    }

    public function testCanSub()
    {
        $this->assertEquals(
            '5',
            RpnCalculator::factory()->process('9 4 -')
        );
    }

    public function testCanMultiply()
    {
        $this->assertEquals(
            '5',
            RpnCalculator::factory()->process('2.5 2 *')
        );
    }

    public function testCanDivide()
    {
        $this->assertEquals(
            '5',
            RpnCalculator::factory()->process('15 3 /')
        );
    }

    public function testMultipleOperations()
    {
        $this->assertEquals(
            '0.625',
            RpnCalculator::factory()->process('5 9 1 - /')
        );
    }

    public function testPartialInput()
    {
        $rpnCalculator = RpnCalculator::factory();

        $this->assertEquals(
            '13',
            $rpnCalculator->process('5 8 +')
        );

        $this->assertEquals(
            '0',
            $rpnCalculator->process('13 -')
        );
    }

    public function testMultipleOperationsInFuzzyOrder()
    {
        $this->assertEquals(
            '11',
            RpnCalculator::factory()->process('-3 -2 * 5 +')
        );
    }

    public function testDivisionByZero()
    {
        $this->expectException(EvaluateException::class);
        RpnCalculator::factory()->process('100 0 /');
    }

    public function testWrongNumberOfOperands()
    {
        $this->expectException(EvaluateException::class);
        RpnCalculator::factory()->process('100 /');
    }

    public function testNonRpnString()
    {
        $this->expectException(UnexpectedItemException::class);
        RpnCalculator::factory()->process('that is just a random string');
    }
}