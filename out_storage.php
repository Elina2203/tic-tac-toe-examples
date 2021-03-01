<?php

$content = file_get_contents('storage.json');

$array = json_decode($content, true);

echo $array['row2'][2];