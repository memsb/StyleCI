<?php

$pairs = [
    ['buy' => 100, 'sell' => 90],
    ['buy' => 102, 'sell' => 90],
    ['buy' => 104, 'sell' => 95],
    ['buy' => 106, 'sell' => 99],
    ['buy' => 103, 'sell' => 93],
    ['buy' => 105, 'sell' => 95],
];

$max = PHP_INT_MIN;
foreach ($pairs as $pair) {
    $margin = $pair['sell'] - $pair['buy'];
    $max = $margin > $max ? $margin : $max;
}

echo $max.PHP_EOL;
