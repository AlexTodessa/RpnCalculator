<?php
namespace RpnCalculator\Operands;

use RpnCalculator\Interfaces\MemberInterface;
use RpnCalculator\Interfaces\ItemInterface;
use RpnCalculator\Traits\ItemTrait;
use RpnCalculator\Interfaces\OutputInterface;
use RpnCalculator\Interfaces\OperandInterface;

/**
 * Operand, that can accept numerics.
 * @author Alexander AlexT Tumanovsky
 */
class NumberOperand implements MemberInterface, ItemInterface, OutputInterface, OperandInterface
{
    use ItemTrait;

    public static function validate(string $item) : bool
    {
        return is_numeric($item);
    }

    public function output() : string
    {
        return (string) $this->item;
    }
}

