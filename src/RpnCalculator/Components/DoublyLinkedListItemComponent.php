<?php

namespace RpnCalculator\Components;

abstract class DoublyLinkedListItemComponent
{
    protected $next  = null;
    protected $prev  = null;
    protected $value = null;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getNext()
    {
        return $this->next;
    }

    protected function setNext($next)
    {
        $this->next = $next;

        return $this;
    }

    public function getPrev()
    {
        return $this->prev;
    }

    protected function setPrev($prev)
    {
        $this->prev = $prev;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function head()
    {
        $item = $this;
        while ($item->getPrev()) {
            $item = $item->getPrev();
        }

        return $item;
    }

    public function tail()
    {
        $item = $this;
        while ($item->getNext()) {
            $item = $item->getNext();
        }

        return $item;
    }

    public function remove()
    {
        $prevItem = $this->getPrev();
        $nextItem = $this->getNext();

        if ($prevItem) {
            $prevItem->setNext(null);
        }

        if ($nextItem) {
            $nextItem->setPrev(null);
        }

        if ($prevItem && $nextItem) {
            $prevItem->append($nextItem);
        }

        return $this;
    }

    public function append(DoublyLinkedListItemComponent $item)
    {
        $previousNext = $this->next;
        $this->next   = $item;
        $item->setPrev($this);

        if ($previousNext) {
            $item->tail()->append($previousNext);
        }

        return $this;
    }


}