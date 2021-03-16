<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'functions.php';
?>
<link rel="stylesheet" href="style.css">



<?php

if (array_key_exists('reset', $_REQUEST)) {
    resetEntries();
    echo "RESET";
}

//array_key_exists('reset', $_REQUEST) && (resetEntries() || print("RESET"));

$entries = getEntries();

$table = &getTable($entries);



if (array_key_exists('r', $_REQUEST) && array_key_exists('c', $_REQUEST)) {
    $r = $_REQUEST['r'];
    $c = $_REQUEST['c'];
    echo "<h3>r=" . $r . "; c= " . $c . "</h3>";
    if (
        (!array_key_exists($r, $table) ||
        !array_key_exists($c, $table[$r]) ||
        $table[$r][$c] === '') &&
        noValueOnRowDown ($table, $r, $c)
    )
    
    {
        $entries['count'] = array_key_exists('count', $entries) ? $entries['count'] + 1 : 1;
        $table[$r][$c] = $entries['count'] % 2 === 0 ? 'o' : "x"; 
        saveEntries($entries);
       
        $winner = checkWinner1($table, $r, $c);
        if ($winner != '') {
            echo($winner. ' wins') . "<br>";
            echo('game over');
            resetEntries();
        }  
        $winner = checkWinner2($table, $r, $c);
        if ($winner != '') {
            echo($winner. ' wins') . "<br>";
            echo('game over'). "<br>";
            resetEntries();
        }  
        $winner = checkWinner3($table, $r, $c);
        if ($winner != '') {
            echo($winner. ' wins') . "<br>";
            echo('game over'). "<br>";
            resetEntries();
        }  
        $winner = checkWinner4($table, $r, $c);
        if ($winner != '') {
            echo($winner. ' wins') . "<br>";
            echo('game over'). "<br>";
            resetEntries();
        }
        $winner = checkWinner5($table, $r, $c);
        if ($winner != '') {
            echo($winner. ' wins') . "<br>";
            echo('game over'). "<br>";
            resetEntries();
        }  
        $winner = checkWinner6($table, $r, $c);
        if ($winner != '') {
            echo($winner. ' wins') . "<br>";
            echo('game over'). "<br>";
            resetEntries(). "<br>";
        }  
        $winner = checkWinner7($table, $r, $c);
        if ($winner != '') {
            echo($winner. ' wins') . "<br>";
            echo('game over'). "<br>";
            resetEntries();
        }  
     $winner = checkWinner8($table, $r, $c);
        if ($winner != '') {
            echo($winner. ' wins') . "<br>";
            echo('game over'). "<br>";
            resetEntries();
        }  
        $winner = checkWinner9($table, $r, $c);
        if ($winner != '') {
            echo($winner. ' wins') . "<br>";
            echo('game over'). "<br>";
            resetEntries();
        }  
    }
    
}


?>
<div class="container">
    <?php 
        for ($r=0; $r<=9; $r++) {
            for ($c=0; $c<=9; $c++) {
                $value = (
                    array_key_exists($r,$table) &&
                    array_key_exists($c,$table[$r])

                    ) ? $table[$r][$c] : '';
                echo "<a href='?r=$r&c=$c'>$value</a>";
            }
            
        }
    ?>

</div>
<a href="?reset=Reset">RESET</a>








