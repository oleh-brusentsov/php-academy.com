<?php
// 23. Вам нужно разработать программу, которая считала бы сумму цифр числа введенного
// пользователем. Например: есть число 123, то программа должна вычислить сумму цифр 1, 2, 3, т. е. 6.

if (is_numeric($_POST['number'])) {
    $res = NULL;
    foreach (str_split($_POST['number']) as $value) {
        $res += $value;
    }
    echo "Сумма чисел введенного числа: " . $res;
}
else {
    if (!$_POST['number'] == NULL) {
        echo "Можно вводить только цифры! Пожалуйста повторите попытку!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Введите число:</title>
</head>
<body>
<form method="POST">
    <label for="number">Пожалуйста введите число:</label>
    <input type="text" name = "number" id="number">

    <input type="submit" value="Отправить">
</form>
</body>
</html>
