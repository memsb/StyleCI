<?php

$hugeInt = '';
$length = rand(100, 200);
for ($i = 1; $i < $length; $i++) {
    $hugeInt .= rand(0, 9);
}

echo "Forward: {$hugeInt}".PHP_EOL;

$string = (string) $hugeInt;

$output = '';
for ($i = 1; $i <= strlen($string); $i++) {
    $output .= substr($string, -$i, 1);
}

echo "Reverse: {$output}".PHP_EOL;

echo implode('', array_reverse(str_split($hugeInt))).PHP_EOL;

$int = rand(0, PHP_INT_MAX);

echo "Forward: {$int}".PHP_EOL;
echo 'Reversed: '.implode('', array_reverse(str_split($int))).PHP_EOL;

$negative = rand(PHP_INT_MIN, PHP_INT_MAX);

echo "Forward: {$negative}".PHP_EOL;
$sign = $negative < 0 ? '-' : '';
echo 'Reversed: '.$sign.implode('', array_reverse(str_split(abs($negative)))).PHP_EOL;
