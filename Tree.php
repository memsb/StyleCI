<?php
class BinaryNode
{
    public $value;    // contains the node item
    public $left;     // the left child BinaryNode
    public $right;     // the right child BinaryNode

    public function __construct($item) {
        $this->value = $item;
        // new nodes are leaf nodes
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree
{
    protected $root; // the root node of our tree

    public function __construct() {
        $this->root = null;
    }

    public function isEmpty() {
        return $this->root === null;
    }
}