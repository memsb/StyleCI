<?php

class Node
{
    /** @var string */
    protected $value;

    /** @var Node */
    protected $next = null;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setNext($next)
    {
        $this->next = $next;
    }

    public function getNext()
    {
        return $this->next;
    }
}

class LinkedList
{
    /** @var Node */
    protected $start;

    /** @var Node */
    protected $end;

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function prepend(Node $node)
    {
        if (empty($this->start)) {
            $this->start = $node;
            $this->end = $node;
        } else {
            $node->setNext($this->start);
            $this->start = $node;
        }
    }

    public function append(Node $node)
    {
        if (empty($this->start)) {
            $this->start = $node;
            $this->end = $node;
        } else {
            $this->end->setNext($node);
            $this->end = $node;
        }
    }
}

class Stack
{
    private $list;

    public function __construct()
    {
        $this->list = new LinkedList();
    }

    public function add($item)
    {
        $this->list->prepend(new Node($item));
    }

    public function pop()
    {
        $first = $this->list->getStart();
        if (!$first) {
            return;
        }
        $next = $first->getNext();
        $this->list->setStart($next);

        return $first->getValue();
    }
}

$fromEnd = 10;
$nums = range(1, 100);

$stack = new Stack();
foreach ($nums as $num) {
    $stack->add($num);
}

do {
    $current = $stack->pop();
    echo $current.PHP_EOL;
} while ($current);
