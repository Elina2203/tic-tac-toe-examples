<?php
// Get request
$result = '';
if (
    array_key_exists("a", $_GET) &&
    array_key_exists("b", $_GET) &&
    is_numeric($_GET['a']) &&
    is_numeric($_GET['b'])
) {
    $result = $_GET['a'] + $_GET['b'];
}
?>



<?php
// Post request

if (
    array_key_exists("a", $_POST) &&
    array_key_exists("b", $_POST) &&

    is_numeric($_POST['a']) &&
    is_numeric($_POST['b'])
) {
    $result = $_POST['a'] . $_POST['b'];
}

if (
    array_key_exists("next", $_POST)){
        echo ($result);
    }

    if (
        array_key_exists("result", $_POST)){
          
            echo ($_REQUEST($result));
        }
    
?>

<h2><?=$result;?></h2>
<pre>
<?php
echo "GET: ". print_r($_GET, true) . '<br>';

echo "POST: " .print_r($_POST, true) . '<br>';

echo "REQUEST: " .print_r($_REQUEST, true) . '<br>';
?>
</pre>