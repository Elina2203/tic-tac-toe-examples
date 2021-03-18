
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'functions.php';
?>

<link rel="stylesheet" href="style.css">

<?php
// проверяем, существует ли ключ reset
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
    
    // First variant

 
  
 

    $winner = checkWiner(getEntry($table, $r, 0), getEntry($table, $r, 1), getEntry($table, $r, 2));
    if ($winner != '') {
        echo($winner. ' wins');
    }

    $winner = checkWiner(getEntry($table, 0, $c), getEntry($table, 1, $c), getEntry($table, 2, $c));
    if ($winner != '') {
        echo($winner. ' wins');
    }
  
    $winner = checkWiner(getEntry($table, 1, 1), getEntry($table, 0, 2), getEntry($table, 2, 0));
    if ($winner != '') {
        echo($winner. ' wins');
    }

    $winner = checkWiner(getEntry($table, 1, 1), getEntry($table, 0, 0), getEntry($table, 2, 2));
    if ($winner != '') {
        echo($winner. ' wins');
    }
}


// Second variant with foreach

//   foreach (["x", "o"] as $player) {
//     foreach ($table as $r => $line) {
//       if ($table[$r][0] == $player && $table[$r][1] == $player && $table[$r][2] == $player) {
//         // Horizontal row found.
//         echo($player . ' wins');
//       }
 
//       foreach ($line as $c => $item) {
//         if ($table[0][$c] == $player && $table[1][$c] == $player && $table[2][$c] == $player) {
//           // Vertical row found.
//           echo($player . ' wins');
//         }
//       }
//     }
//     if ($table[0][0] == $player && $table[1][1] == $player && $table[2][2] == $player) {
//       // Diagonal line top left to bottom right found.
//       echo($player . ' wins');
//     }
//     if ($table[2][0] == $player && $table[1][1] == $player && $table[0][2] == $player) {
//       // Diagonal line bottom left to top right found.
//       echo($player . ' wins');
//     }
//   }
// }
    

 
?>

<div class="container">
    <?php
    for ($r = 0; $r < 3; $r++) {
        for ($c = 0; $c < 3; $c++) {
            $value = (
                array_key_exists($r,$table) &&
                array_key_exists($c,$table[$r])
                ) ? $table[$r][$c] : '';
            echo "<a href='?r=$r&c=$c'>" . $value . "</a>";
        } 
    }

    ?>

</div>
<!-- ссылка в адресную -->
<a href="?reset=Reset">RESET</a>

<pre><?=print_r($table, true)?></pre>
