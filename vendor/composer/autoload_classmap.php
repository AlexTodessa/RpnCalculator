<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'RpnCalculator\\Components\\DoublyLinkedListItemComponent' => $baseDir . '/src/RpnCalculator/Components/DoublyLinkedListItemComponent.php',
    'RpnCalculator\\Exceptions\\EvaluateException' => $baseDir . '/src/RpnCalculator/Exceptions/EvaluateException.php',
    'RpnCalculator\\Exceptions\\UnexpectedItemException' => $baseDir . '/src/RpnCalculator/Exceptions/UnexpectedItemException.php',
    'RpnCalculator\\Exceptions\\UnsupportedMemberException' => $baseDir . '/src/RpnCalculator/Exceptions/UnsupportedMemberException.php',
    'RpnCalculator\\Interfaces\\EvaluateInterface' => $baseDir . '/src/RpnCalculator/Interfaces/EvaluateInterface.php',
    'RpnCalculator\\Interfaces\\ItemInterface' => $baseDir . '/src/RpnCalculator/Interfaces/ItemInterface.php',
    'RpnCalculator\\Interfaces\\ListItemInterface' => $baseDir . '/src/RpnCalculator/Interfaces/ListItemInterface.php',
    'RpnCalculator\\Interfaces\\MemberInterface' => $baseDir . '/src/RpnCalculator/Interfaces/MemberInterface.php',
    'RpnCalculator\\Interfaces\\OperandInterface' => $baseDir . '/src/RpnCalculator/Interfaces/OperandInterface.php',
    'RpnCalculator\\Interfaces\\OutputInterface' => $baseDir . '/src/RpnCalculator/Interfaces/OutputInterface.php',
    'RpnCalculator\\Operands\\NumberOperand' => $baseDir . '/src/RpnCalculator/Operands/NumberOperand.php',
    'RpnCalculator\\Operators\\AdditionOperator' => $baseDir . '/src/RpnCalculator/Operators/AdditionOperator.php',
    'RpnCalculator\\Operators\\DivisionOperator' => $baseDir . '/src/RpnCalculator/Operators/DivisionOperator.php',
    'RpnCalculator\\Operators\\Extra\\CosOperator' => $baseDir . '/src/RpnCalculator/Operators/Extra/CosOperator.php',
    'RpnCalculator\\Operators\\Extra\\ModOperator' => $baseDir . '/src/RpnCalculator/Operators/Extra/ModOperator.php',
    'RpnCalculator\\Operators\\Extra\\PowOperator' => $baseDir . '/src/RpnCalculator/Operators/Extra/PowOperator.php',
    'RpnCalculator\\Operators\\Extra\\SinOperator' => $baseDir . '/src/RpnCalculator/Operators/Extra/SinOperator.php',
    'RpnCalculator\\Operators\\MultiplicationOperator' => $baseDir . '/src/RpnCalculator/Operators/MultiplicationOperator.php',
    'RpnCalculator\\Operators\\SubstractionOperator' => $baseDir . '/src/RpnCalculator/Operators/SubstractionOperator.php',
    'RpnCalculator\\RpnCalculator' => $baseDir . '/src/RpnCalculator/RpnCalculator.php',
    'RpnCalculator\\RpnItem' => $baseDir . '/src/RpnCalculator/RpnItem.php',
    'RpnCalculator\\Traits\\ItemTrait' => $baseDir . '/src/RpnCalculator/Traits/ItemTrait.php',
    'RpnCalculator\\Traits\\LeftAndRightOperandsTrait' => $baseDir . '/src/RpnCalculator/Traits/LeftAndRightOperandsTrait.php',
    'RpnCalculator\\Traits\\OneOperandTrait' => $baseDir . '/src/RpnCalculator/Traits/OneOperandTrait.php',
);
