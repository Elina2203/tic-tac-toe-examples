<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once('DataManager.php');
include_once('FormManager.php');
$manager = new FormManager();

?>

<h2>Add</h2>
<form action="?action=add" method="post">
    <input type="text" name="username" placeholder="username">
    <input type="text" name="message" placeholder="message">
    <button type="submit">submit message</button>
</form>

<h2>Update</h2>
<form action="?action=update" method="post">
    <select name="id">
        <?php
            foreach ($manager->getAll() as $key => $value) {
                $username = $value['username'];
               
                echo "<option value='$key'>$key : $username</option>";
            }
        ?>
    </select>
    <input type="text" name="username" placeholder="username">
    <input type="text" name="message" placeholder="message">
    <button type="submit">update message</button>
</form>

<?php
/*NEW PART START*/


if (array_key_exists('action', $_REQUEST)) {
    if ($_REQUEST['action'] == 'add') {
        $manager->add($_REQUEST);
    }
    elseif ($_REQUEST['action'] == 'update') {
        $manager->updateMessages($_REQUEST);
    }
}

if (array_key_exists('delete', $_REQUEST)) {
    $manager->delete($_REQUEST['delete']);
}


if ($manager->getAll() !== []) {
    echo "<h2>View</h2>";
    echo "<ul>";
        foreach ($manager->getAll() as $key => $value) {
            $username = $value['username'];
            $message = $value['message'];
            echo "<li>$username: $message <a href='?delete=$key'>[X]</a></li>";
        }
    echo "</ul>";
}
else {
    echo 'no data yet';
}