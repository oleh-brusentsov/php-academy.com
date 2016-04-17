<?php

// 21. Приведите число 0 к типу boolean. Объясните результат.

$b = 0;
var_dump($b);
echo "<br>";
$b = (bool) $b;
var_dump($b);
?>