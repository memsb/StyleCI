<?php

/*
 *
 * Nullable types
 * Void returns
 * Array de-structuring
 * multiple exceptions
 * constant visibility
 */


class MyClass
{

    public const NAME = 'My Awesome Class';
    protected const SLIGHTLY_SECRET_NAME = 'My Awesome Class';
    private const SECRET_NAME = 'My Awesome Class';

    protected $names = [];

    public function __construct()
    {
        $this->names[] = self::NAME;
        $this->names[] = self::SLIGHTLY_SECRET_NAME;
        $this->names[] = self::SECRET_NAME;
    }

    public function addName(?string $myname): void
    {
        if (!empty($myname)) {
            $this->names[] = $myname;
        }
    }

    public function findName(string $name): string
    {
        if (!in_array($name, $this->names)) {
            throw new InvalidArgumentException('name not found');
        }

        if($name == self::NAME){
           throw new BadFunctionCallException("that's me!");
        }

        return $name;
    }

    public function findNames(): array
    {
        return $this->names;
    }
}

class Child extends MyClass
{
    public function __construct()
    {
        $this->names[] = self::NAME;
        $this->names[] = self::SLIGHTLY_SECRET_NAME;
    }
}

$class = new MyClass();
$class->addName('Martin');

$result = $possible ?? 'backup';
echo $result . PHP_EOL;

$i = 0;
$i += 1;
$i = $i + 1;

$result = $result ?? 'backup';

try {
    echo 'Hello '.$class->findName('Martin').PHP_EOL;
    echo 'Hello '.$class->findName(MyClass::NAME).PHP_EOL;
}catch(BadFunctionCallException | InvalidArgumentException $e){
    echo $e->getMessage() . PHP_EOL;
}
