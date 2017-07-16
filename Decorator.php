<?php

interface Renderable
{
    public function render();
}

class Component implements Renderable
{
    public function render()
    {
        // TODO: Implement render() method.
    }
}

abstract class Container implements Renderable
{
    private $renderable;

    public function __construct(Renderable $renderable)
    {
        $this->renderable = $renderable;
    }

    public function render()
    {
        // TODO: Implement render() method.
    }
}

class Wrapper1 extends Container
{
}

class Wrapper2 extends Container
{
}

$item = new Wrapper1(new Wrapper2(new Wrapper1(new Component())));
$item->render();
