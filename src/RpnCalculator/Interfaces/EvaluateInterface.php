<?php
namespace RpnCalculator\Interfaces;

/**
 * Tells RPN Calculator, that this Operator/Operand/Other member can be evaluated and make changes to sequence.
 * @author Alexander AlexT Tumanovsky
 */
interface EvaluateInterface
{
    /**
     *
     * @param ListItemInterface $item
     * @throws \RpnCalculator\Exceptions\EvaluateException
     */
    public function evaluate(ListItemInterface $item);
}

