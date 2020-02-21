<?php
namespace RpnCalculator\Operators;

use RpnCalculator\Interfaces\MemberInterface;
use RpnCalculator\Traits\ItemTrait;
use RpnCalculator\Interfaces\ItemInterface;
use RpnCalculator\Traits\LeftAndRightOperandsTrait;
use RpnCalculator\Interfaces\ListItemInterface;
use RpnCalculator\Interfaces\EvaluateInterface;
use RpnCalculator\Exceptions\EvaluateException;
use RpnCalculator\Operands\NumberOperand;

class DivisionOperator implements MemberInterface, ItemInterface, EvaluateInterface
{
    use ItemTrait;
    use LeftAndRightOperandsTrait;

    public static function validate(string $item) : bool
    {
        return $item === '/';
    }

    public function evaluate(ListItemInterface $item)
    {
        [$leftOperandListItem, $rightOperandListItem] = $this->getLeftAndRightOperands($item);

        if ($rightOperandListItem->getValue()->getItem() == 0) {
            throw new EvaluateException('Division by zero.');
        }

        $result = $leftOperandListItem->getValue()->getItem() / $rightOperandListItem->getValue()->getItem();
        $rightOperandListItem->remove();
        $item->remove();
        $leftOperandListItem->setValue(new NumberOperand($result));
    }
}

