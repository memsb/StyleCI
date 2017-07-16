<?php

$arr = [];
foreach (range(1, 10000) as $num) {
    $arr[] = rand(1, 100);
}
$found = [];
$target = 55;

foreach ($arr as $value) {
    $found[$value] = $value;
}

$pairs = [];
foreach ($found as $left) {
    $right = $target - $left;
    if (array_key_exists($right, $found)) {
        $pairs[] = [$left, $right];
    }
}
print_r($pairs);
