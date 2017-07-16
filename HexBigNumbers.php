<?php


$length = 2;


function getHexArray(int $length): array
{
    $arr = [];
    foreach (range(1, $length) as $i) {
        $arr[] = dechex(rand(0, 15));
    }

    return $arr;
}


function addHex($left, $right)
{
    $sum = [];
    $carry = 0;
    for ($i = count($left) - 1; $i >= 0; $i--) {
        $value = hexdec($left[$i]) + hexdec($right[$i]) + hexdec($carry);
        if ($value > 15) {
            $value %= 16;
            $carry = 1;
        }else{
            $carry = 0;
        }
        array_unshift($sum, dechex($value));
    }

    return $sum;
}

$left = getHexArray(12);
$right = getHexArray(12);
$sum = addHex($left, $right);
echo implode('', $left).'+'.implode('', $right).'='.implode('', $sum).PHP_EOL;