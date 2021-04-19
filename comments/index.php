<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);// Добавлять в отчёт все ошибки PHP

    include 'DB.php';
    $db = new DB();
?>

<link rel="stylesheet" href="style.css">
<!-- Событие onsubmit возникает при отправке формы, это обычно происходит, когда пользователь нажимает специальную кнопку Submit. -->
<form action="request.php" method="post" onsubmit="postSubmit.bind(this)(event, addElement)">
    <label for="comment-name">Name</label>
    <input type="text" name="name" id="comment-name">

    <label for="comment-message">Comment</label>
    <textarea name="comment" id="comment-message" cols="30" rows="10"></textarea>
    <button type="submit">add comment</button>
</form>

<?php
    echo $db->last_error;

    $db->displayAll();
?>

<!-- My file -->

<script src="script.js"></script>