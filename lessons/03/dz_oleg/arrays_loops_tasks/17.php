﻿<?php
// 17.Сосктавьте массив месяцев. С помощью цикла foreach выведите все месяцы, а текущий
// месяц выведите жирным. Текущий месяц должен храниться в переменной $month.

$arr = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
$month = $arr[date('n') - 1];
foreach ($arr as $value) {
    if ($value == $month) {
        echo "<b>" . $value . "</b><br>";
    } else {
        echo $value . "<br>";
    }
}
