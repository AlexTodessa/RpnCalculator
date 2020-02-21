<?php

namespace RpnCalculator;

use RpnCalculator\Interfaces\MemberInterface;
use RpnCalculator\Exceptions\UnsupportedMemberException;
use RpnCalculator\Interfaces\OutputInterface;
use RpnCalculator\Interfaces\EvaluateInterface;
use RpnCalculator\Interfaces\ListItemInterface;
use RpnCalculator\Exceptions\UnexpectedItemException;
use RpnCalculator\Exceptions\EvaluateException;

/**
 * RpnCalculator class
 * Accepts RPN string on input, returns string on output.
 * @author Alexander AlexT Tumanovsky
 */
class RpnCalculator
{
    /**
     * @var MemberInterface[] List of members of current calculator instance.
     */
    private $members;

    /**
     * @var ListItemInterface A head item of currently existing RPN sequence
     */
    private $head;

    /**
     * Creates an instance of RPN Calculator with given functionality members.
     * @param MemberInterface ...$members
     * @throws UnsupportedMemberException
     */
    public function __construct(string ...$members)
    {
        foreach ($members as $member) {
            if (is_a($member, MemberInterface::class, true)) {
                $this->members[] = $member;
            } else {
                throw new UnsupportedMemberException($member);
            }
        }
    }

    /**
     * Resets the sequence to start from scratch.
     */
    public function reset()
    {
        $this->head = null;
    }

    /**
     *
     * Processes the given RPN String.
     * Statefull, remembers the last input until an operand, that can handle it, appears in sequence.
     *
     * @param string $input RPN String
     * @throws UnexpectedItemException RPN String Item is not accepted by any member
     * @throws EvaluateException RPN String Sequence cannot be completed
     * @return string RPN Evaluation Output
     */
    public function process(string $input) : ?string
    {
        $head  = null;
        $items = explode(' ', $input);
        if (empty($items)) return null;

        foreach ($items as $item) {
            if (strlen($item) < 1) continue;
            $rpnItem = $this->processItem($item);

            if (is_null($rpnItem)) {
                throw new UnexpectedItemException($item);
            }

            if (is_null($head)) {
                $head = $rpnItem;
            } else {
                $head->tail()->append($rpnItem);
            }
        }

        if (is_null($head)) return null;

        if (is_null($this->head)) {
            $this->head = $head;
        } else {
            $this->head->tail()->append($head);
        }

        try {
            $current = $next = $head = $this->head;
            do {
                $item = $next->getValue();
                if ($item instanceof EvaluateInterface) {
                    $item->evaluate($next);
                }
                $current = $next;
            } while ($next = $current->getNext());
        } catch (\Exception $e) {
            $this->head = null;
            throw new EvaluateException($e->getMessage());
        }

        $output = '';
        if ($this->head && $this->head->tail()->getValue() instanceof OutputInterface) {
            $output = (string) $this->head->tail()->getValue()->output();
        }
        return $output;
    }

    /**
     * Processes exactly one RPN string item, and returns a RpnItem wrapped member instance on success.
     * @param string $item One RPN String Item
     * @return RpnItem|NULL
     */
    protected function processItem(string $item) : ?RpnItem
    {
        foreach ($this->members as $member) {
            if ($member::validate($item)) {
                $itemInstance = new $member($item);
                return new RpnItem($itemInstance);
            }
        }

        return null;
    }

    /**
     *
     */
    public function dump()
    {
        $seq = [];
        if ($this->head) {
            $head = $this->head;
            do {
                $seq[] = $head->getValue()->getItem();
            } while ($head = $head->getNext());
        }
        return $seq ? implode(' ', $seq) : '';
    }
}