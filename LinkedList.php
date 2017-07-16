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

class DoubleNode
{
    /** @var string */
    protected $value;

    /** @var Node */
    private $prev = null;

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

    public function setNext(DoubleNode $next)
    {
        $this->next = $next;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setPrev(DoubleNode $prev)
    {
        $this->prev = $prev;
    }

    public function getPrev()
    {
        return $this->prev;
    }
}

class DoubleLinkedList
{
    /** @var DoubleNode */
    protected $start;

    /** @var DoubleNode */
    protected $end;

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function append(DoubleNode $node)
    {
        if (empty($this->start)) {
            $this->start = $node;
            $this->end = $node;
        } else {
            $this->end->setNext($node);
            $node->setPrev($this->end);
            $this->end = $node;
        }
    }
}

class Stack
{
    private $items = [];

    public function add($item)
    {
        $this->items[] = $item;
    }

    public function pop()
    {
        return array_pop($this->items);
    }
}

$fromEnd = 10;
$nums = range(1, 100);

$list = new LinkedList();
foreach ($nums as $num) {
    $node = new Node($num);
    $list->append($node);
}

$stack = new Stack();
$current = $list->getStart();
while ($current !== null) {
    $stack->add($current->getValue());
    $current = $current->getNext();
}

$startedAt = microtime(true);
$found = null;
for ($i = 0; $i < $fromEnd; $i++) {
    $found = $stack->pop();
}

echo $found.PHP_EOL;

$endedAt = microtime(true);
echo(($endedAt - $startedAt) * 1000000).PHP_EOL;

$dll = new DoubleLinkedList();
$current = $list->getStart();
while ($current !== null) {
    $dll->append(new DoubleNode($current->getValue()));
    $current = $current->getNext();
}

$startedAt = microtime(true);
$current = $dll->getEnd();
for ($i = 1; $i < $fromEnd; $i++) {
    echo $current->getValue().PHP_EOL;
    $current = $current->getPrev();
}

echo $current->getValue().PHP_EOL;

$endedAt = microtime(true);
echo(($endedAt - $startedAt) * 1000000).PHP_EOL;
