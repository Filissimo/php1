<?php
$num1 = 30;
$num2 = 50;
$num3 = 22.50;
$str1 = "Hello \n World";
$bool1 = false;
$arr = 
    ["123",123,$str1]
;
$arr2 = [
    "name"=>"Vitaly",
    "surname"=>"Korabelnikov"
];



// var_dump($num1,$num2,$num3,$str1,$arr);
// print_r($num1 + $num2);
// print_r($arr[2]);
// print_r($arr2["name"], $arr2["surname"]);

// echo json_encode($arr2);



$num1 *= 100;

echo $num1;

$a .= "Мир!";


// Оператор для дополнения строки




?>

<h1>
    <?php echo "Ваше имя " .  $arr2["name"] . " " . $arr2["surname"]?>
</h1>
<h1>
    <?php echo "Ваше имя {$arr2["name"]} {$arr2["surname"]}"?>
</h1>

<!-- Подсчитать сумму кредита если взяли 5000 на 24 месяца 12% годовых -->

