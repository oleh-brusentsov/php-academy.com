<?php

// 13. Вывести таблицу умножения

$rows = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');

foreach($rows as $i) {
    foreach ($rows as $n) {
        echo $i * $n;
        if ($i == 10) echo "<br>";
    }
}

?>