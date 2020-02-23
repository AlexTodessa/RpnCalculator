<?php
namespace RpnCalculator\Traits;

use RpnCalculator\Exceptions\EvaluateException;
use RpnCalculator\Interfaces\OperandInterface;
use RpnCalculator\RpnItem;

/**
 * Trait, that allowes to get Left and Right operands from the sequence, as that's the most common used scenario.
 * Validates them to be operands.
 * @author Alexander AlexT Tumanovsky
 */
trait LeftAndRightOperandsTrait
{
    /**
     *
     * @param RpnItem $item
     * @throws EvaluateException
     * @return array RpnItem[]
     */
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

