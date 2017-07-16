<?php


$arr = [2, 6, 8, 4, 5, 6, 3, 4, 5];

echo array_sum($arr).PHP_EOL;

function sumAllExcept(array $arr, $index)
{
    return array_sum(array_diff_key($arr, [$index => $arr[$index]]));
}

$output = [];
for ($i = 0; $i < count($arr); $i++) {
    $output[] = sumAllExcept($arr, $i);
}

echo implode(',', $output).PHP_EOL;
