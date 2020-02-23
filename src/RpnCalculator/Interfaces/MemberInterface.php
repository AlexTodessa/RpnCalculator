<?php
namespace RpnCalculator\Interfaces;

/**
 * Shows RPN Calculator that the class, implementing this interface, can validate RPN String Items, and on success
 * - and instance of such member should be created.
 * @author Alexander AlexT Tumanovsky
 */
interface MemberInterface
{
    /**
     * Checks, if current member accepts the passed item.
     * @param string $item
     * @return bool
     */
    public static function validate(string $item) : bool;
}

