<?php

interface Wash
{
    public function run();
}

class Washer implements Wash
{
    public function run()
    {
        $this->soak();
        $this->wash();
        $this->rinse();
        $this->spin();
        $this->dry();
    }

    protected function soak()
    {
        echo 'soak for 5 mins';
    }

    protected function wash()
    {
        echo 'wash for 50 mins';
    }

    protected function rinse()
    {
        echo 'rinse for 5 mins';
    }

    protected function spin()
    {
        echo 'spin for 5 mins';
    }

    protected function dry()
    {
        echo 'dry for 50 mins';
    }
}

class FastWasher extends Washer
{
    protected function wash()
    {
        echo 'wash for 20 mins';
    }

    protected function dry()
    {
        echo 'dry for 20 mins';
    }
}

$washer = new Washer();
$washer->run();

$fastWasher = new FastWasher();
$fastWasher->run();
