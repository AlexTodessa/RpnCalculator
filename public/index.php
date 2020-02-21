<?php
use RpnCalculator\Operands\NumberOperand;
use RpnCalculator\Operators\AdditionOperator;
use RpnCalculator\Operators\SubstractionOperator;
use RpnCalculator\Operators\MultiplicationOperator;
use RpnCalculator\Operators\DivisionOperator;
use RpnCalculator\RpnCalculator;
use RpnCalculator\Operators\Extra\PowOperator;
use RpnCalculator\Operators\Extra\ModOperator;
use RpnCalculator\Operators\Extra\SinOperator;
use RpnCalculator\Operators\Extra\CosOperator;

require __DIR__ . '/../vendor/autoload.php';

session_start();
if (!empty($_POST['action']) && $_POST['action'] == 'restart') {
    unset($_SESSION['instance'], $_POST);

}

echo '<h1>RPN Calculator</h1><hr/>';

$options = [
    'nums' => [NumberOperand::class,          'Numbers'],
    'add'  => [AdditionOperator::class,       'Addition (with + sign)'],
    'sub'  => [SubstractionOperator::class,   'Substraction (with - sign)'],
    'mult' => [MultiplicationOperator::class, 'Multiplication (with * sign)'],
    'div'  => [DivisionOperator::class,       'Division (with / sign)'],

    'pow'  => [PowOperator::class,            'Pow/Exponent (with ** sign)'],
    'mod'  => [ModOperator::class,            'Integer Mod Devision (with % sign)'],
    'sin'  => [SinOperator::class,            'Sinus (with sin command)'],
    'cos'  => [CosOperator::class,            'Cosinus (with cos command)'],

];


if (empty($_SESSION['instance']) && !isset($_POST)) {
    echo '<h2>Please, compose your calculator instance</h2>';
    echo '<form method="post">';
    $inputs = [];
    foreach ($options as $key => $option) {
        $inputs[] = '<input type="checkbox" name="keys[]" value="' . $key . '" checked> ' . $option[1];
    }
    echo '<ul><li>' . implode('</li><li>', $inputs) . '</li></ul>';
    echo '<input type="submit" value="start">';
    echo '</form>';
} else if (empty($_SESSION['instance']) && !empty($_POST['keys'])) {
    $members = [];
    foreach ($_POST['keys'] as $key) {
        if (!empty($options[$key])) {
            $members[] = $options[$key][0];
        }
    }
    $rc = new ReflectionClass(RpnCalculator::class);
    $rpnCalc = $rc->newInstanceArgs($members);

    $_SESSION['instance'] = serialize($rpnCalc);
}

if (isset($_SESSION['instance'])) {
    echo '<pre>';
    $rpnCalc = unserialize($_SESSION['instance']);

    if (!empty($_POST['action']) && $_POST['action'] == 'reset') {
        $rpnCalc->reset();
    }

    echo 'Current Sequence: ' . $rpnCalc->dump() . '</br>';

    if (!empty($_POST) && array_key_exists('input', $_POST)) {
        echo 'Current input:    ' . htmlspecialchars($_POST['input']) . '<br/>';
        try {
            echo 'Output:           ' . $rpnCalc->process($_POST['input']) . '<br/>';
        } catch (\RpnCalculator\Exceptions\UnexpectedItemException $e) {
            echo 'ERROR! Unexpected Item :' . $e->getMessage() . '<br/>';
        } catch (\RpnCalculator\Exceptions\EvaluateException $e) {
            echo 'ERROR! Evaluation failed. Sequence destroyed. ' . $e->getMessage() . '<br/>';
        }}

    echo 'New Sequence:     ' . $rpnCalc->dump() . '</br>';

    echo '</pre>';

    echo '<form method="post"><input type="text" name="input"><input type="submit" value="send"></form><hr/>';
    echo '<form method="post"><input type="submit" name="action" value="reset"></form>';
    echo '<form method="post"><input type="submit" name="action" value="restart"></form>';
    $_SESSION['instance'] = serialize($rpnCalc);
}