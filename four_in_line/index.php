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
        !array_key_exists($r, $table) ||
        !array_key_exists($c, $table[$r]) ||
        $table[$r][$c] === ''
       
    ) {
        $entries['count'] = array_key_exists('count', $entries) ? $entries['count'] + 1 : 1;
        $table[$r][$c] = $entries['count'] % 2 === 0 ? 'o' : "x";
        saveEntries($entries);
        
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
                   
                if ($r === 9 && $c === 2) {
                    $value = 'x';
                }
               
                echo "<a href='?r=$r&c=$c'>$value</a>";
            }
            
        }
    ?>

</div>
<a href="?reset=Reset">RESET</a>

<pre><?=print_r($table, true)?></pre>






