<?php
namespace RpnCalculator\Traits;

trait ItemTrait
{
    protected $item;
    public function __construct(string $item)
    {
        $this->item = $item;
    }

    public function getItem()
    {
        return $this->item;
    }

    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }
}

