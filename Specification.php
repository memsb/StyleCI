<?php

class Rate
{

    public function getPrice()
    {
        return 5;
    }
}

interface Specification
{

    public function isSatisfiedBy(Rate $rate);
}

class Plus implements Specification
{

    private $left;
    private $right;

    public function __construct(Specification $left, Specification $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    public function isSatisfiedBy(Rate $rate)
    {
        return $this->left->isSatisfiedBy($rate) && $this->right->isSatisfiedBy($rate);
    }
}

class Either implements Specification
{

    private $left;
    private $right;

    public function __construct(Specification $left, Specification $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    public function isSatisfiedBy(Rate $rate)
    {
        return $this->left->isSatisfiedBy($rate) || $this->right->isSatisfiedBy($rate);
    }
}

class ExclusiveEither implements Specification
{

    private $left;
    private $right;

    public function __construct(Specification $left, Specification $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    public function isSatisfiedBy(Rate $rate)
    {
        return $this->left->isSatisfiedBy($rate) XOR $this->right->isSatisfiedBy($rate);
    }
}

class Not implements Specification
{

    private $spec;

    public function __construct(Specification $spec)
    {
        $this->spec = $spec;
    }

    public function isSatisfiedBy(Rate $rate)
    {
        return !$this->spec->isSatisfiedBy($rate);
    }
}

class MinPriceSpecification implements Specification
{
    private $min;

    public function __construct(float $min)
    {
        $this->min = $min;
    }

    public function isSatisfiedBy(Rate $rate)
    {
        return $rate->getPrice() > $this->min;
    }
}

class MaxPriceSpecification implements Specification
{
    private $max;

    public function __construct(float $max)
    {
        $this->max = $max;
    }

    public function isSatisfiedBy(Rate $rate)
    {
        return $rate->getPrice() < $this->max;
    }
}

$spec = new Plus(
    new MaxPriceSpecification(10),
    new Either(
        new MaxPriceSpecification(6),
        new MinPriceSpecification(4)
    )
);

echo $spec->isSatisfiedBy(new Rate()) ? 'Buy!' : 'Sell!';
echo PHP_EOL;