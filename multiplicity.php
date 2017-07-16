<?php

$multiSet = [2, 1, 3, 2, 4, 5, 3, 4, 5, 5, 4, 3, 4, 5, 5];

$frequency = array_count_values($multiSet);

usort(
    $multiSet,
    function ($left, $right) use ($frequency) {
        return $frequency[$left] < $frequency[$right];
    }
);

echo implode($multiSet, ',') . PHP_EOL;