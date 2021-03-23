
<link rel="stylesheet" href="index.css">

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'Controller.php';
$manager = new Controller();//создаем новый объект
?>

<?php
    $amount = 42;

    if ((string)$amount === '42') {
        echo "<h1>equals </h1>";

    }
    /*
    Проверяем существует ли ключ amount, является ли он числом и больше 0; ТОгда присваиваем 
    переменной amount значение, которое мы ввели */ 
    if (array_key_exists('amount', $_GET)) {
        if ((int)$_GET['amount'] == $_GET['amount'] && $_GET['amount'] > 0) {
            $amount = $_GET['amount'];
        }
/*в переменной content хранится закодированный в текстовый формат многомерный массив
 с ключами amount и links. amount - это просто строка, а links это массив.
*/
        $content = json_encode(['amount' => $amount, 'links' => []]);
//загружаем переменную content в текстовый файл db.json.
        file_put_contents('db.json', $content);
    }
    else {
        /*Проверяем, если файл существует, то content получает содержимое db.json 
        в переменной db хранится раскодированное содержимое переменной content
        -ассоциативный массив. Переменной amount мы присваиеваем значение ключа 'amount' массива db*/ 
        if (file_exists('db.json')) {
            $content = file_get_contents('db.json');
            $db = json_decode($content, true);
            $amount = $db['amount'];
            $links = $db ['links'];
        }
    }

?>

<form action="" method="get">
    <input type="number" name="amount" value="<?= $amount; ?>">
    <button type="submit">submit</button>
</form>
<?='id = '. @$_GET['id'] . "<br>";?>
<?php
if (array_key_exists('id', $_GET)) {
    // if ($_GET['id'] % 3 === 0) {
    //     echo $_GET['id'];
        // $new_value = $_GET['id'] + 1;
        // $manager->add($_GET['id'], $new_value);
  
        //функция, которая увеличивает id на единицу и выводит на экран новое значение   id.
        $manager->increase($_GET['id']); 
        }
// }
?>

<div class="container">
<?php 
//каждый пятый элемент получает класс fifth и закрашивается в какой-то цвет
for ($i = 1; $i <= $amount; $i++) {
    $classes = ($i % 5 == 0) ? 'class="fifth"' : '';//если делится на 5 без остатка, то присваивается класс fifth
    $value = $i;
    echo "<a $classes href='?id=$i'>$value</a>";
}

?>

</div>