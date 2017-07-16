<?php


function fib($places, $result = [0, 1])
{
    $lastIndex = count($result) - 1;
    $result[] = $result[$lastIndex - 1] + $result[$lastIndex];

    if (count($result) < $places) {
        $result = fib($places, $result);
    }

    return $result;
}

$num = 20;
$sequence = fib($num);
echo implode($sequence, ',').PHP_EOL;

function getFib($n)
{
    return round(((sqrt(5) + 1) / 2) ** $n / sqrt(5));
}

$pos = 10;
echo getFib($pos).PHP_EOL;