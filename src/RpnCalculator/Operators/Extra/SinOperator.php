<?php
namespace RpnCalculator\Operators\Extra;

use RpnCalculator\Interfaces\MemberInterface;
use RpnCalculator\Interfaces\ItemInterface;
use RpnCalculator\Traits\ItemTrait;
use RpnCalculator\Interfaces\ListItemInterface;
use RpnCalculator\Interfaces\EvaluateInterface;
use RpnCalculator\Operands\NumberOperand;
use RpnCalculator\Traits\OneOperandTrait;

class SinOperator implements MemberInterface, ItemInterface, EvaluateInterface
{
    use ItemTrait;
    use OneOperandTrait;

    public static function validate(string $item) : bool
    {
        return $item === 'sin';
    }

    public function evaluate(ListItemInterface $item)
    {
        $operandListItem = $this->getOperand($item);
        $result = sin($operandListItem->getValue()->getItem());
        $item->remove();
        $operandListItem->setValue(new NumberOperand($result));
    }
}

