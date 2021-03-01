<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$default = [
    [0, 0, 0],
    [0, 0, 0],
    [0, 0, 0]
];

// Example #1
$content = fill($default, function (&$ent2, $r, $c) {
    $ent2[$r][$c] = 'x';
});


// Example #2
$entries = $default;
for ($r = 0; $r <= 2; $r++) {
    for ($c = 1; $c <= 2; $c++) {
        $entries[$r][$c] = 'x';
    }
}
$content = $content . output($entries);

// Example #3
$content = $content . fill($default, function (&$ent2, $r, $c) {
    if ($r != 1 || $c != 1) {
        $ent2[$r][$c] = 'x';
    }
});

file_put_contents('storage.txt', $content);


function fill($ent1, $callback) {
    for ($r = 0; $r <= 2; $r++) {
        for ($c = 0; $c <= 2; $c++) {
            $callback($ent1, $r, $c);
        }
    }
    return output($ent1);
}
function output($ent) {
    static $i = 0;
    $i++;
    $out = PHP_EOL . "Example #$i" . PHP_EOL;

    for ($r = 0; $r <= 2; $r++) {
        $out = $out  . "|";
        for ($c = 0; $c <= 2; $c++) {
            $out = $out . $ent[$r][$c]  . "|";
        }
        $out = $out . PHP_EOL;
    }

    return $out;
}


// Example #4
$entries = $default;
for ($r = 0; $r < 3; $r++) {
    for ($c = 0; $c < 3 ; $c++) {
        if ($c >= 0 && $r === 1) {
            continue;
        }
        $entries[$r][$c] = 'x';
        }
    
}
$content = $content . PHP_EOL . PHP_EOL .  output($entries);

file_put_contents('storage.txt', $content);

// Example #5
$entries = $default;
for ($r = 0; $r < 3; $r++) {
    for ($c = 0; $c < 3 ; $c++) {
        if ($c >= 1 && $r === 2) {
            continue;
        }
        $entries[$r][$c] = 'x';
        }
    
}
$content = $content . PHP_EOL . PHP_EOL .  output($entries);

file_put_contents('storage.txt', $content);

// Example #6
$entries = $default;
for ($r = 0; $r < 3; $r++) {
    for ($c = 0; $c < 3 ; $c++) {
        if ($c >= 1 && $r >= 1) {
            continue;
        }
        $entries[$r][$c] = 'x';
        }
    
}
$content = $content . PHP_EOL . PHP_EOL .  output($entries);

file_put_contents('storage.txt', $content);

// Example #7
$entries = $default;
for ($r = 0; $r < 3; $r++) {
    for ($c = 0; $c < 3 ; $c++) {
        if ($c === 1 && $r === 0 || $c === 1 && $r === 2 ||$r ===1 ) {
            continue;
        }
        $entries[$r][$c] = 'x';
        }
    
}
$content = $content . PHP_EOL . PHP_EOL .  output($entries);

file_put_contents('storage.txt', $content);

// Example #8
$entries = $default;
for ($r = 0; $r < 3; $r++) {
    for ($c = 0; $c < 3 ; $c++) {
        if ($c >= 0 && $r === 1)  {
            $entries[$r][$c] = 'm';
      
        }
        if ($c > 0 && $r === 0 || $c > 0 && $r === 2 || $r === 1 ) {
        
            continue;
        }
        $entries[$r][$c] = 'x';
        }
    
}
$content = $content . PHP_EOL . PHP_EOL .  output($entries);

file_put_contents('storage.txt', $content);


// Example #9
$entries = $default;
$i=1;
for ($r = 2; $r >=0; $r--) {
    for ($c = 2; $c >= 0 ; $c = $c - 2) {
            $entries[$r][$c] = $i++;
    }    
}
$content = $content . PHP_EOL . PHP_EOL .  output($entries);

file_put_contents('storage.txt', $content);

// Example #10
$entries = $default;
$i_new=0;
$i_old=1;
for ($r = 2; $r >=0; $r--) {
    for ($c = 2; $c >= 0 ; $c = $c - 2) {
        $a = $i_new;
        $i_new = $i_new + $i_old;
        $i_old = $a;

        $entries[$r][$c] = $i_new;
    }      
}
$content = $content . PHP_EOL . PHP_EOL .  output($entries);

file_put_contents('storage.txt', $content);


$json_example_array = [
    'row1' => [1, 4, 8],
    'row2' => [6, 2, 5],
    'row3' => [9, 7, 3]
];

file_put_contents('storage.json', json_encode($json_example_array));