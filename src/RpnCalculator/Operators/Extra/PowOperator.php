<?php
namespace RpnCalculator\Operators\Extra;

use RpnCalculator\Interfaces\MemberInterface;
use RpnCalculator\Interfaces\ItemInterface;
use RpnCalculator\Traits\ItemTrait;
use RpnCalculator\Traits\LeftAndRightOperandsTrait;
use RpnCalculator\Interfaces\ListItemInterface;
use RpnCalculator\Interfaces\EvaluateInterface;
use RpnCalculator\Operands\NumberOperand;

/**
 * Pow Operator.
 * @author Alexander AlexT Tumanovsky
 */
class PowOperator implements MemberInterface, ItemInterface, EvaluateInterface
{
    use ItemTrait;
    use LeftAndRightOperandsTrait;

    public static function validate(string $item) : bool
    {
        return $item === '**';
    }

    public function evaluate(ListItemInterface $item)
    {
        [$leftOperandListItem, $rightOperandListItem] = $this->getLeftAndRightOperands($item);
        $result = $leftOperandListItem->getValue()->getItem() ** $rightOperandListItem->getValue()->getItem();
        $rightOperandListItem->remove();
        $item->remove();
        $leftOperandListItem->setValue(new NumberOperand($result));
    }
}

