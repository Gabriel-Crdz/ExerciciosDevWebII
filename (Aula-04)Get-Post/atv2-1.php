<?php
echo "MEDIA DE 3 VALORES(GET):<br>";

function media($n1, $n2, $n3){
    return ($n1 + $n2 + $n3) / 3;
}

$num1 = $_GET["num1"];
$num2 = $_GET["num2"];
$num3 = $_GET["num3"];

echo media($num1, $num2, $num3);
?>