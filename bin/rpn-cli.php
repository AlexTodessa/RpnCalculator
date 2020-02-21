<?php
use RpnCalculator\RpnCalculator;
use RpnCalculator\Operands\NumberOperand;
use RpnCalculator\Operators\AdditionOperator;
use RpnCalculator\Operators\SubstractionOperator;
use RpnCalculator\Operators\MultiplicationOperator;
use RpnCalculator\Operators\DivisionOperator;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Main instance of the calculator, interface agnostic. Can be used with any interface, will accept PRN string, and will
 * return result string (in most cases - a tail number of the sequence).
 * @var \RpnCalculator\RpnCalculator $RpnCalculator
 */
$RpnCalculator = new RpnCalculator(
    NumberOperand::class,
    AdditionOperator::class,
    SubstractionOperator::class,
    MultiplicationOperator::class,
    DivisionOperator::class
);

echo <<<EOF
Welcome to Rpn Calculator CLI Interface.

r - Reset
d - Dump current sequence
q - Quit

In case of a sequence error - use arrow up/arrow down to go through input history.

EOF;

/**
 * Main Execution Loop.
 */
while (true) {
    $output = null;
    $input = readline('> ');
    readline_add_history($input);
    if ($input === false) {
        echo chr(10);
        $input = 'q';
    }
    $input = strtolower($input);
    switch ($input) {
        case 'q':
            break 2;
        case 'r':
            $RpnCalculator->reset();
            $output = 'Sequence reset.';
            break;
        case 'd':
            $output = $RpnCalculator->dump() ?: null;
            break;
        default:
            try {
                $output = $RpnCalculator->process($input);
            } catch (\RpnCalculator\Exceptions\UnexpectedItemException $e) {
                $output = 'ERROR! Unexpected Item :' . $e->getMessage();
            } catch (\RpnCalculator\Exceptions\EvaluateException $e) {
                $output = 'ERROR! Evaluation failed. Sequence destroyed. ' . $e->getMessage();
            }
    }

    if (!is_null($output)) {
        echo $output . chr(10) . chr(10);
        $output = null;
    }
}

echo 'Bye.' . chr(10);