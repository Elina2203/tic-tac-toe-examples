<?php
if(array_key_exists("color", $_GET)) {
    $color = $_GET ['color'];
}
else {
    $color = 'red';
}

if(array_key_exists("bg", $_GET)) {
    $bg = $_GET ['bg'];
}
else {
    $bg = 'skyblue';
}
$size = array_key_exists ("size", $_GET) ? $_GET ['size'] : 30;
    


?>
h2 {
    color:<?=$color;?>;
    background:<?=$bg;?>;
    font-size:<?=$size?>px;
}

form {
    margin-top:20px;
}