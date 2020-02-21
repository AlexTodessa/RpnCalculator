<?php
namespace RpnCalculator\Traits;

use RpnCalculator\Exceptions\EvaluateException;
use RpnCalculator\Interfaces\OperandInterface;

trait LeftAndRightOperandsTrait
{
    public function getLeftAndRightOperands($item)
    {
        $rightOperandListItem = $item->getPrev();
        if (!$rightOperandListItem) {
            throw new EvaluateException('Expected right operand to exist.');
        }

        $rightOperand = $rightOperandListItem->getValue();
        if (!is_a($rightOperand, OperandInterface::class)) {
            throw new EvaluateException('Expected right operand to be a number.');
        }

        $leftOperandListItem = $rightOperandListItem->getPrev();
        if (!$leftOperandListItem) {
            throw new EvaluateException('Expected left operand to exist.');
        }

        $leftOperand = $leftOperandListItem->getValue();
        if (!is_a($leftOperand, OperandInterface::class)) {
            throw new EvaluateException('Expected left operand to be a number.');
        }

        return [$leftOperandListItem, $rightOperandListItem];
    }
}

