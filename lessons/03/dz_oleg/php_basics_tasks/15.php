﻿<?php

// 15. Написать калькулятор. Переменная $a = изменяемое число. Переменная $b = изменяемое число. Переменная $operator = ‘+’ или ‘-’ или ‘/’ или ‘*’ или '%' (остаток от деления).
// На экран выводить результат в зависимости от значений этих переменных. Не забудьте про деление на 0, если надо - выдавать ошибку что на 0 делить нельзя.

$a = 9;
$b = 8;
$operator = "/";


// калькулятор if|else
if ($operator == "+") {
    $result = $a + $b;
}
elseif ($operator == "-") {
    $result = $a - $b;
}
elseif ($operator == "*") {
    $result = $a * $b;
}
elseif ($operator == "/") {
    if ($b == 0) {
        $result = "Ошибка! Делить на 0 нельзя!";
    }
    else {
        $result = $a / $b;
    }
}
elseif ($operator == "%") {
    $result = $a % $b;
}

echo $result;

?>