<?php
echo "MAIOR NUMERO:<br>";

$num1 = $_GET["num1"];
$num2 = $_GET["num2"];
$num3 = $_GET["num3"];

$maior = $num1;

if($num2 > $maior){
    $maior = $num2;
}
if($num3 > $maior){
    $maior = $num3;
}

echo $maior;
?>