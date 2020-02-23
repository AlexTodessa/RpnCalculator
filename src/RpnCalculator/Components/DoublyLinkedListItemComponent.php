<?php

namespace RpnCalculator\Components;

/**
 * A quick interpretation of a classical doubly linked list.
 * @author Alexander Alext Tumanovsky
 */
abstract class DoublyLinkedListItemComponent
{
    protected $next  = null;
    protected $prev  = null;
    protected $value = null;

    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Get next item in the list
     * @return null|\RpnCalculator\Components\DoublyLinkedListItemComponent
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * Set item to be the next after current
     * Note, that it's protected - only internal members are allowed to modify the order like that.
     * External should use append/remove functions, which would alter the list correctly.
     * @param null|\RpnCalculator\Components\DoublyLinkedListItemComponent
     * @return $this
     */
    protected function setNext($next)
    {
        $this->next = $next;

        return $this;
    }

    /**
     * Get previous item from the list
     * @return null|\RpnCalculator\Components\DoublyLinkedListItemComponent
     */
    public function getPrev()
    {
        return $this->prev;
    }

    /**
     * Set item to be the previous, before current
     * Note, that it's protected - only internal members are allowed to modify the order like that.
     * External should use append/remove functions, which would alter the list correctly.
     * @param null|\RpnCalculator\Components\DoublyLinkedListItemComponent
     * @return $this
     */
    protected function setPrev($prev)
    {
        $this->prev = $prev;

        return $this;
    }

    /**
     * Get the actual value of the list item
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the actual value of the list item
     * @param mixed $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the head of the list
     * @return \RpnCalculator\Components\DoublyLinkedListItemComponent|NULL
     */
    public function head()
    {
        $item = $this;
        while ($item->getPrev()) {
            $item = $item->getPrev();
        }

        return $item;
    }

    /**
     * Get the tail of the list
     * @return \RpnCalculator\Components\DoublyLinkedListItemComponent|NULL
     */
    public function tail()
    {
        $item = $this;
        while ($item->getNext()) {
            $item = $item->getNext();
        }

        return $item;
    }

    /**
     * Remove current node from the list, and connect prev and next nodes together
     * @return \RpnCalculator\Components\DoublyLinkedListItemComponent
     */
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

    /**
     * Append new node to the list right after current one, and connect all the other nodes o newly added.
     * @param DoublyLinkedListItemComponent $item
     * @return \RpnCalculator\Components\DoublyLinkedListItemComponent
     */
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