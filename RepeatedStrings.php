<?php

//mb_substr($string, $pointer++, 1, 'UTF-8')

$string = 'aabbcccccdddddeeeeefggggghijjka';

// long but correct
$output = '';
$buffer = [];
for ($i = 0; $i < strlen($string); $i++) {
    $current = $string[$i];
    $nextIndex = $i + 1;
    $buffer[] = $current;
    if (!($nextIndex < strlen($string) && $string[$nextIndex] == $current)) {
        $output .= count($buffer).$current;
        $buffer = [];
    }
}

echo $output.PHP_EOL;

// Compact but flawed

$histo = array_count_values(str_split($string));
echo array_reduce(
        array_keys($histo),
        function ($carry, $key) use ($histo) {
            return $carry.$histo[$key].$key;
        }
    ).PHP_EOL;
