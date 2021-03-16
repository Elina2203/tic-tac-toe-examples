<?php

function getEntries() {
    $entries = json_decode(file_get_contents('tictactoe_db.json'), true);
    if (!is_array($entries)) {
        $entries = ['table'=>  [], 'count'=> 0] ;
    }
    return $entries;
}

function &getTable(&$entries) {
    $entries['table'] = array_key_exists('table', $entries) ? $entries['table'] : [];

    return $entries['table'];
}


function saveEntries($entries) {
    file_put_contents('tictactoe_db.json', json_encode($entries, JSON_PRETTY_PRINT));
}

function resetEntries() {
    file_put_contents('tictactoe_db.json', '');
}

function getEntry($table, $r, $c) {
    if (
        array_key_exists($r,$table) &&
                array_key_exists($c,$table[$r])
                ) {
                    return $table[$r][$c];
                } 
    return '';
}

function noValueOnRowDown ($table, $r, $c) {
    if ($r == 9 || getEntry($table, $r + 1, $c)) {
return true;
    }
    return false;
}

function checkWinner1($table, $r, $c, $y_axis = 0, $x_axis = 0) {
    $value = getEntry($table, $r, $c);
    $count = 0;

    for ($i = 1; $i <= 3; $i++) {
        $r = $r + $y_axis;
        $c = $c + $x_axis;
        if (getEntry($table, $r, $c) == $value) {
            $count++; 
        }
    }
    if ($count == 3) {
        throw new Exception($value);
    }
}

function checkWinner6($table, $r, $c) {
    if (getEntry($table, $r, $c+1) ==
        getEntry($table, $r, $c-1) &&
        getEntry($table, $r, $c-1)==
        getEntry($table, $r, $c-2))
        if (
        getEntry($table, $r, $c-1) ==
        getEntry($table, $r, $c))
         {
return $table[$r][$c];     
    }
    else {
return '';
    }
}   
function checkWinner7($table, $r, $c) {
    if (getEntry($table, $r, $c-1) ==
        getEntry($table, $r, $c+1) &&
        getEntry($table, $r, $c+1)==
        getEntry($table, $r, $c+2))
        if (
        getEntry($table, $r, $c-1) ==
        getEntry($table, $r, $c))
         {
return $table[$r][$c];     
    }
    else {
return '';
    }
}   