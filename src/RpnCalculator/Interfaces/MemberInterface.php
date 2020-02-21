<?php
namespace RpnCalculator\Interfaces;

interface MemberInterface
{
    public static function validate(string $item) : bool;
}

