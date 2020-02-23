<?php
namespace RpnCalculator\Operators\Extra;

use RpnCalculator\Interfaces\MemberInterface;
use RpnCalculator\Interfaces\ItemInterface;
use RpnCalculator\Traits\ItemTrait;
use RpnCalculator\Interfaces\ListItemInterface;
use RpnCalculator\Interfaces\EvaluateInterface;
use RpnCalculator\Operands\NumberOperand;
use RpnCalculator\Traits\OneOperandTrait;

/**
 * Cosinus Operator.
 * Difference from other operators, that it operates with only 1 operand.
 * @author Alexander AlexT Tumanovsky
 */
class CosOperator implements MemberInterface, ItemInterface, EvaluateInterface
{
    use ItemTrait;
    use OneOperandTrait;

    public static function validate(string $item) : bool
    {
        return $item === 'cos';
    }

    public function evaluate(ListItemInterface $item)
    {
        $operandListItem = $this->getOperand($item);
        $result = cos($operandListItem->getValue()->getItem());
        $item->remove();
        $operandListItem->setValue(new NumberOperand($result));
    }
}

