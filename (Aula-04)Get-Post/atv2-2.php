<?php
echo "MEDIA DE 3 VALORES(POST):<br>";

function media($n1, $n2, $n3){
    return ($n1 + $n2 + $n3) / 3;
}

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$num3 = $_POST["num3"];

echo media($num1, $num2, $num3);
?>