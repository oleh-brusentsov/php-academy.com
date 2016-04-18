<?php
// 27. Создать генератор случайных таблиц. Есть переменные: $row - кол-во строк в таблице,
// $cols - кол-во столбцов в таблице. Есть список цветов, в массиве: $colors = array('red','yellow','blue','gray','maroon','brown','green').
// Необходимо создать скрипт, который по заданным условиям выведет таблицу размера $rows на $cols, в которой все ячейки будут иметь цвета,
// выбранные случайным образом из массива $colors. В каждой ячейке должно находиться случайное число.

$row = $_POST['row'];
$cols = $_POST['cols'];
$colors = array('red','yellow','blue','gray','maroon','brown','green');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Случайная таблица!</title>
    </head>
<body>
<form method="POST">
    <label for="row">Количество строк:</label>
    <input type="text" name = "row" id="row">

    <label for="cols">Количество столбцов:</label>
    <input type="text" name = "cols" id="cols">

    <input type="submit" value="Построить таблицу">
</form>
<br>
<table>
    <?php
    for ($i = 0; $i < $row; $i++) {
        echo "<tr>";
        for ($n = 0; $n < $cols; $n++) {
            echo "<td style='border: 1px solid black; background-color: " . $colors[array_rand($colors)] . ";'>" . rand(100, 999) . "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
