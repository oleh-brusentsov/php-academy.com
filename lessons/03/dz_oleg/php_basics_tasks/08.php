﻿<?php

// 8. Расширьте конструкцию if из п.5-7, выводя фразу: "Неизвестный возраст" при условии, что значение переменной age является отрицательным числом, или вовсе числом не является.
$age = 23;
if (is_int($age) && $age >= 18 && $age <= 59) {
    echo "Вам еще работать и работать...";
}
else if (is_int($age) && $age > 59 ) {
    echo "Вам пора на пенсию!!!";
}
else if (is_int($age) && $age < 18 && $age >= 0 ) {
    echo "Вам еще рано работать!!!";
}
else {
    echo "Неизвестный возраст!!!";
}

?>