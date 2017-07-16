<?php

interface OldInterface
{
    public function oldMethod(string $arg): string;
}

class OldWorker implements OldInterface {

    public function oldMethod(string $arg): string
    {
        return $arg;
    }
}

class Client {

    private $worker;

    public function __construct(OldInterface $worker)
    {
        $this->worker = $worker;
    }

    public function doStuff(): string
    {
        return $this->worker->oldMethod('This is a test');
    }
}

interface NewInterface
{
    public function newMethod(string $arg): string;
}

class NewWorker implements NewInterface {

    public function newMethod(string $arg): string
    {
        return strtoupper($arg);
    }
}


class NewInterfaceAdapter implements OldInterface {

    private $newInterface;

    public function __construct(NewInterface $newInterface)
    {
        $this->newInterface = $newInterface;
    }

    public function oldMethod(string $arg): string
    {
        return $this->newInterface->newMethod($arg);
    }
}

$client = new Client(new NewInterfaceAdapter(new NewWorker()));
echo $client->doStuff() . PHP_EOL;