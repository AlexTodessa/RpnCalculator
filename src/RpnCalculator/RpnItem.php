<?php
namespace RpnCalculator;

use RpnCalculator\Components\DoublyLinkedListItemComponent;
use RpnCalculator\Interfaces\ItemInterface;
use RpnCalculator\Interfaces\ListItemInterface;

class RpnItem extends DoublyLinkedListItemComponent implements ListItemInterface
{
    public function __construct(ItemInterface $item) {
        parent::__construct($item);
    }
}