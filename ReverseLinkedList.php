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

function makeLinkedList(int $length = 100): LinkedList
{
    $nums = range(1, $length);

    $list = new LinkedList();
    foreach ($nums as $num) {
        $node = new Node($num);
        $list->append($node);
    }

    return $list;
}

function display(LinkedList $list)
{
    $output = [];
    $current = $list->getStart();
    do {
        $output[] = $current->getValue();
    } while ($current = $current->getNext());
    echo implode(',', $output).PHP_EOL;
}

function reverse(LinkedList $list): LinkedList
{
    $stack = new Stack();
    $current = $list->getStart();
    do {
        $stack->add($current->getValue());
    } while ($current = $current->getNext());

    $reversedList = new LinkedList();
    while ($value = $stack->pop()) {
        $reversedList->append(new Node($value));
    }

    return $reversedList;
}

function reverseInPlace(LinkedList $list): LinkedList
{
    $current = $list->getStart();
}

$list = makeLinkedList();
display($list);
$reversedList = reverse($list);
display($reversedList);

$list = makeLinkedList();
display($list);
$reversedList = reverseInPlace($list);
display($reversedList);
