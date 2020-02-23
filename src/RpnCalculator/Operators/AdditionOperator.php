<?php
namespace RpnCalculator\Operators;

use RpnCalculator\Interfaces\MemberInterface;
use RpnCalculator\Interfaces\ItemInterface;
use RpnCalculator\Traits\ItemTrait;
use RpnCalculator\Interfaces\EvaluateInterface;
use RpnCalculator\Interfaces\ListItemInterface;
use RpnCalculator\Traits\LeftAndRightOperandsTrait;
use RpnCalculator\Operands\NumberOperand;

/**
 * Operator, that can add two numbers and put the result back into left operand numeric.
 * @author Alexander AlexT Tumanovsky
 */
class AdditionOperator implements MemberInterface, ItemInterface, EvaluateInterface
{
    use ItemTrait;
    use LeftAndRightOperandsTrait;

    public static function validate(string $item) : bool
    {
        return $item === '+';
    }

    public function evaluate(ListItemInterface $item)
    {
        [$leftOperandListItem, $rightOperandListItem] = $this->getLeftAndRightOperands($item);
        $result = $leftOperandListItem->getValue()->getItem() + $rightOperandListItem->getValue()->getItem();
        $rightOperandListItem->remove();
        $item->remove();
        $leftOperandListItem->setValue(new NumberOperand($result));
    }
}

