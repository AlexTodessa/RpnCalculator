<?php
namespace RpnCalculator\Traits;

use RpnCalculator\Exceptions\EvaluateException;
use RpnCalculator\Interfaces\OperandInterface;

trait OneOperandTrait
{
    public function getOperand($item)
    {
        $operandListItem = $item->getPrev();
        if (!$operandListItem) {
            throw new EvaluateException('Expected operand to exist.');
        }

        $operand = $operandListItem->getValue();
        if (!is_a($operand, OperandInterface::class)) {
            throw new EvaluateException('Expected operand to be a number.');
        }

        return $operandListItem;
    }
}

