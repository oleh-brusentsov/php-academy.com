<?php

// 26. Объявите константу DAYS_COUNT равную 7 и константу MONTH_COUNT равную 12 двумя разными способами объявления констант.


define("DAYS_COUNT", 7);
const MONTH_COUNT = 12;

echo DAYS_COUNT . " - дней в неделю! <br> " . MONTH_COUNT . " - месяцев в год!";
?>