<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use RpnCalculator\RpnItem;
use RpnCalculator\Operands\NumberOperand;

final class RpnItemTest extends TestCase
{
    public function getSequence()
    {
        $rpnItem1 = new RpnItem(new NumberOperand('1'));
        $rpnItem2 = new RpnItem(new NumberOperand('2'));
        $rpnItem3 = new RpnItem(new NumberOperand('3'));

        $rpnItem1->append($rpnItem2);
        $rpnItem2->append($rpnItem3);

        return $rpnItem1;
    }

    public function testAppendTail()
    {
        $head = $this->getSequence();
        $rpnItem4 = new RpnItem(new NumberOperand('4'));
        $head->tail()->append($rpnItem4);

        $this->assertEquals('4', $head->tail()->getValue()->getItem());
    }

    public function testRemoveMiddle()
    {
        $head = $this->getSequence();
        $head->getNext()->remove();
        $this->assertEquals('3', $head->getNext()->getValue()->getItem());
    }

    public function testAppendAfterHead()
    {
        $head = $this->getSequence();
        $rpnItem4 = new RpnItem(new NumberOperand('4'));
        $head->append($rpnItem4);
        $this->assertEquals('4', $head->getNext()->getValue()->getItem());
        $this->assertEquals('2', $head->getNext()->getNext()->getValue()->getItem());
    }



}