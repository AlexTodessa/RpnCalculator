# RpnCalculator
A Composite Rpn Calculator, accepting string and returning string. Sometimes throws exceptions.

## Architecture ##
RpnCalculator class accepts a list of members as arguments, and every member coresponds to one of the input items types.
Operands are usually numbers, but with additional effort a variables can be introduced.
All recieved items are set to a Doubly Linked List for ease of traversing between items, as well as easy replace with
result of calculation.

Hosted Application: http://rpncalc.developer.od.ua/

## Running CLI Version ##

$ git checkout git@github.com:AlexTodessa/RpnCalculator.git
$ cd RpnCalculator/bin
$ php rpn-cli.php

CLI version only uses basic operators (+, -, \*, /), for full demo please see the hosted version.
