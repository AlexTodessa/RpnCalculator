<?php
namespace RpnCalculator\Interfaces;

/**
 * Tells RPN Calculator, that instance can produce some output.
 * @author Alexander AlexT Tumanovsky
 */
interface OutputInterface
{
    public function output() : string;
}

