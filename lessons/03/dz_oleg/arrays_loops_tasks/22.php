<?php
// 22. Нарисуйте пирамиду, как показано на рисунке, воспользовавшись циклом for или while.
// xx
// xxxx
// xxxxxx
// xxxxxxxx
// xxxxxxxxxx

for ($i = "xx"; strlen($i) <= 10; $i .= "xx" ) {
    echo $i . "<br>";
}
