<?php
namespace RpnCalculator\Traits;

/**
 * Item Trait to allow members to hold an item.
 * Done to avoid copy-paste.
 * @author Alexander AlexT Tumanovsky
 */
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

