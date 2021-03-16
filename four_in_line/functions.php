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
// function checkWinner($element1, $element2, $element3) {
//     if(
//        getEntry($element1) == getEntry($element2) &&
//        getEntry($element2) == getEntry($element3) &&
//        getEntry($element3) == getEntry($table, $r, $c))
//     {
        
//     return $table[$r][$c];
//     }
//     else {
//       return '';
//     }
// } 


function checkWinner1($table, $r, $c) {
    if (
        getEntry($table, $r+1, $c) ==
        getEntry($table, $r+2, $c) &&
        getEntry($table, $r+2, $c)==
        getEntry($table, $r+3, $c)){
        if (
        getEntry($table, $r+1, $c) ==
        getEntry($table, $r, $c))
         {
         
        return $table[$r][$c]; 
         }
    }
    else {
        return '';
    }
 
} 
    
function checkWinner2($table, $r, $c) {
    if (
        getEntry($table, $r+1, $c-1) ==
        getEntry($table, $r+2, $c-2) &&
        getEntry($table, $r+2, $c-2)==
        getEntry($table, $r+3, $c-3)) {
        if (
        getEntry($table, $r+1, $c-1) ==
        getEntry($table, $r, $c)) 
         {
        return $table[$r][$c]; 
        }
    }
    else {
        return '';
    }
}   
function checkWinner3($table, $r, $c) {
    if (
        getEntry($table, $r+1, $c+1) ==
        getEntry($table, $r+2, $c+2) &&
        getEntry($table, $r+2, $c+2)==
        getEntry($table, $r+3, $c+3)) {
        if (
        getEntry($table, $r+1, $c+1) ==
        getEntry($table, $r, $c)) 
         {
        return $table[$r][$c]; 
        }
   }
    else {
        return '';
    }
}   
function checkWinner4($table, $r, $c) {
    if (
        getEntry($table, $r, $c+1) ==
        getEntry($table, $r, $c+2) &&
        getEntry($table, $r, $c+2)==
        getEntry($table, $r, $c+3)) {
        if (
        getEntry($table, $r, $c+1) ==
        getEntry($table, $r, $c))
         {
        return $table[$r][$c]; 
        }
   }
    else {
        return '';
    }
}   
function checkWinner5($table, $r, $c) {
    if (
        getEntry($table, $r, $c-1) ==
        getEntry($table, $r, $c-2) &&
        getEntry($table, $r, $c-2)==
        getEntry($table, $r, $c-3)) {
        if (
        getEntry($table, $r, $c-1) ==
        getEntry($table, $r, $c))
         {
        return $table[$r][$c]; 
        }
   }
    else {
        return '';
    }
}   
function checkWinner6($table, $r, $c) {
    if (
        getEntry($table, $r, $c+1) ==
        getEntry($table, $r, $c-1) &&
        getEntry($table, $r, $c-1)==
        getEntry($table, $r, $c-2)) {
        if (
        getEntry($table, $r, $c-1) ==
        getEntry($table, $r, $c))
         {
        return $table[$r][$c]; 
        }
    }
    else {
        return '';
    }
}   
function checkWinner7($table, $r, $c) {
    if (
        getEntry($table, $r, $c-1) ==
        getEntry($table, $r, $c+1) &&
        getEntry($table, $r, $c+1)==
        getEntry($table, $r, $c+2)) {
        if (
        getEntry($table, $r, $c-1) ==
        getEntry($table, $r, $c))
         {
        return $table[$r][$c]; 
        }
   }
    else {
        return '';
    }
}   
function checkWinner8($table, $r, $c) {
    if (
        getEntry($table, $r+1, $c-1) ==
        getEntry($table, $r-1, $c+1) &&
        getEntry($table, $r-1, $c+1)==
        getEntry($table, $r-2, $c+2)) {
        if (
        getEntry($table, $r-1, $c+1) ==
        getEntry($table, $r, $c))
         {

        return $table[$r][$c]; 
        }
   }
    else {
        return '';
    }
}   
function checkWinner9($table, $r, $c) {
    if (
        getEntry($table, $r+1, $c-1) ==
        getEntry($table, $r+2, $c-2) &&
        getEntry($table, $r+2, $c-2)==
        getEntry($table, $r-1, $c+1)) {
        if (
        getEntry($table, $r-1, $c+1) ==
        getEntry($table, $r, $c))
         {

        return $table[$r][$c]; 
        }
   }
    else {
        return '';
    }
}   