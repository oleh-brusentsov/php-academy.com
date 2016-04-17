<?php
// 25. Ваше задание создать массив, наполнить это случайными значениями (функция rand), найти максимальное и минимальное значение и поменять их местами.

// генерируем массив с рандомными значениями
$arr = array();
for ($i = 0; $i <= 10; $i++) {
    $arr[] .= rand();
}

// ищем ключ максимального и минимального значений
$arr_key_max = array_search(max($arr), $arr);
$arr_key_min = array_search(min($arr), $arr);
echo "До замены! Индекс массива: {$arr_key_max}. Значение: {$arr[$arr_key_max]}. <br>";
echo "До замены! Индекс массива: {$arr_key_min}. Значение: {$arr[$arr_key_min]}  <br>";

echo "<pre>";
var_dump($arr);
echo "</pre><hr>";

// меняем местами значения с помощью промежуточной переменной $buf
$buf = $arr[$arr_key_max];
$arr[$arr_key_max] = $arr[$arr_key_min];
$arr[$arr_key_min] = $buf;
echo "После замены! Индекс массива: {$arr_key_max}. Значение: {$arr[$arr_key_max]}. <br>";
echo "После замены! Индекс массива: {$arr_key_min}. Значение: {$arr[$arr_key_min]}  <br>";

echo "<pre>";
var_dump($arr);
echo "</pre>";
