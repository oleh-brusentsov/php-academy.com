<!DOCTYPE html>
<html>
<head>
    <title>Введите число:</title>
    <meta charset="UTF-8">
</head>
<body>

<?php
// 24. Вам нужно разработать программу, которая считала бы количество вхождений
// какой­нибуть выбранной вами цифры в выбранном вами числе. Например: цифра 5 в числе 442158755745 встречается 4 раза.

if (is_numeric($_POST['number']) && is_numeric($_POST['search'])) {
    $res = substr_count($_POST['number'], $_POST['search']);
    echo "Число {$_POST['search']} , встречается {$res} раз(а) в строке {$_POST['number']}!";
}
else {
    if (!$_POST['number'] == NULL || !$_POST['search'] == NULL) {
        echo "Можно вводить только цифры! Пожалуйста повторите попытку! <hr>";
    }
}
?>

<form method="POST">
    <label for="number">Число в котором искать:</label>
    <input type="text" name = "number" id="number">

    <label for="search">Число для поиска:</label>
    <input type="text" name = "search" id="search">

    <input type="submit" value="Отправить">
</form>
</body>
</html>
