<?php
// функция, которая создает массив $entries
function getEntries() {
    // переменной $entries присваиваем содержимое файла json формата переведенное 
    // в формат php. так как массив ассоциативныйб добавляем True.
    // file_get_contents('tictactoe_db.json') закодированная в виде текстового формата информация
    $entries = json_decode(file_get_contents('tictactoe_db.json'), true);
    if (!is_array($entries)) {
        // Если массив еще не существует, то мы создаем многомерный массив, в котором
        // два ключа 'table' и 'count'. В свою очередь, 'table' тоже является массивом.
        $entries = ['table'=>  [], 'count'=> 0] ;
    }
    // в результате мы выводим за пределы функции массив $entries
    return $entries;
}


// функция, которая создает массив 'table', если его еще не существует
function &getTable(&$entries) {
    $entries['table'] = array_key_exists('table', $entries) ? $entries['table'] : [];

    return $entries['table'];
    // в результате мы выводим за пределы функции массив $entries с ключем 'table'
}


function saveEntries($entries) {
    file_put_contents('tictactoe_db.json', json_encode($entries, JSON_PRETTY_PRINT));
    // функция, в которой массив  $entries закодированный в текстовой формат записывается в
    // 'tictactoe_db.json'. JSON_PRETTY_PRINT - это предопределенная константа, используется для 
    //  пробельных символов в возвращаемых данных для их форматирования. Чтобы отображалась информация в более 
    // читаемом формате
}

function resetEntries() {
    file_put_contents ('tictactoe_db.json', '');
    // в 'tictactoe_db.json' будет записываться пустой файл
}

function checkWiner($element1, $element2, $element3) {
    if (($element1 == $element2) && ($element2 == $element3)) {
        return $element1;
    }
    else {
        return '';
    }
}
// 'x' || 'o' || ''
function getEntry($table, $r, $c) {
    if (
        array_key_exists($r,$table) &&
        array_key_exists($c,$table[$r])
)  {
    return $table[$r][$c];
} 
return '';
            }
