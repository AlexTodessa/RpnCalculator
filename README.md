# RpnCalculator
A Composite Rpn Calculator, accepting string and returning string. Sometimes throws exceptions.

## Architecture ##
RpnCalculator class accepts a list of members as arguments, and every member coresponds to one of the input items types.
Operands are usually numbers, but with additional effort a variables can be introduced.
All recieved items are set to a Doubly Linked List for ease of traversing between items, as well as easy replace with
result of calculation.

Hosted Application: http://rpncalc.developer.od.ua/

## Running CLI Version ##
```
$ git checkout git@github.com:AlexTodessa/RpnCalculator.git
$ cd RpnCalculator/bin
$ php rpn-cli.php
```
CLI version only uses basic operators (+, -, \*, /), for full demo please see the hosted version.

## Examples of use ##

```php
$rpnCalculator = new RpnCalculator(
    NumberOperand::class,
    AdditionOperator::class,
    SubstractionOperator::class,
    MultiplicationOperator::class,
    DivisionOperator::class
);
```

The following example would create an instance of RpnCalculator, with support of numbers, Addition, Substraction, Multiplication and Division.

Simple usage example:
```php
echo $rpnCalculator->process('1 1 +'); //returns 2
```

Statefull usage example:
```php
echo $rpnCalculator->process('1'); //returns 1
echo $rpnCalculator->process('1'); //returns 1
echo $rpnCalculator->process('+'); //returns 2
```

Mixed usage example
```php
echo $rpnCalculator->process('1 1'); //returns 1
echo $rpnCalculator->process('+');   //returns 2
echo $rpnCalculator->process('2 -'); //returns 0
```

## Supported Operations ##

### Default ###
* Numbers
* Addition (with + sign)
* Substraction (with - sign)
* Multiplication (with * sign)
* Division (with / sign)

### Extra ###
* Pow/Exponent (with ** sign)
* Modulo (with % sign)
* Sinus (with sin command)
* Cosinus (with cos command)

## Additional planned features ##
Variables with $ prefix as operands, = sign as assigning operator.

# Extending the RPN Calculator #
If you want to extend the number of operators and/or operands types - make sure you implement the following interfaces with your newly
added classes:

## For Operators ##
* MemberInterface
* ItemInterface
* EvaluateInterface

## For Operands ##
* MemberInterface
* ItemInterface
* OutputInterface
* OperandInterface

Have Fun :)

# To Do, Plans for future #
* Add a required number of operands to precceed an operator so an error can be discovered before validation, without sequence loss
* Add support of Variable Operand and Assign Operator for more complex examples solving
* Add support of sequences branching, an analog of standard calculator's Memory feature
* Add ability to calculate percentages (conflicts with modulo symbol)
