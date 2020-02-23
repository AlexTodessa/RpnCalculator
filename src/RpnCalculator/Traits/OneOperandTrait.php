<?php
namespace RpnCalculator\Traits;

use RpnCalculator\Exceptions\EvaluateException;
use RpnCalculator\Interfaces\OperandInterface;
use RpnCalculator\RpnItem;

/**
 * For some operations, only 1 operand is nessecary (sin, cos, etc).
 * Gets one operand from the sequence, validate it to be operand, and returns it's corresponding list item.
 * @author Alexander AlexT Tumanovsky
 */
trait OneOperandTrait
{
    /**
     *
     * @param RpnItem $item
     * @throws EvaluateException
     * @return RpnItem
     */
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

