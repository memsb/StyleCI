<?php

$length = 2;

function getNumberArray(int $length): array
{
    $arr = [];

    foreach (range(1, $length) as $i) {
        $arr[] = rand(1, 9);
    }

    return $arr;
}

function addArrays(array $left, array $right): array
{
    $sum = [];
    $carry = 0;
    for ($i = count($left) - 1; $i >= 0; $i--) {
        $value = $left[$i] + $right[$i] + $carry;
        $value = $value % 10;
        $carry = $value > 9 ? 1 : 0;
        array_unshift($sum, $value);
    }

    return $sum;
}

$left = getNumberArray($length);
$right = getNumberArray($length);
$result = addArrays($left, $right);

echo implode('', $left).' + '.implode('', $right).' = '.implode('', $result).PHP_EOL;

function getNumberString(int $length): string
{
    return implode('', getNumberArray($length));
}

function addStrings(string $left, string $right): string
{
    $sum = '';
    $carry = 0;
    for ($i = strlen($left) - 1; $i >= 0; $i--) {
        $value = $left[$i] + $right[$i] + $carry;
        $value = $value % 10;
        $carry = $value > 9 ? 1 : 0;
        $sum = $value.$sum;
    }

    return $sum;
}

$left = getNumberString($length);
$right = getNumberString($length);
$result = addStrings($left, $right);

echo "{$left} + {$right} = {$result}".PHP_EOL;
