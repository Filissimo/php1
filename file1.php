<?php
$num1 = 5000;
$percent = 12;
$years = 2;
$additional_money = $percent * $years * $num1 * 0.01;
$result = $num1 + $additional_money;
echo "
Вы взяли в кредит $num1 на 2 года под 
Отдавать вам придётся на $additional_money больше
всего $result
";
?>