<?php
echo "SOMA USANDO GET/POST:<br>";

function soma($n1, $n2){
    return $n1 + $n2;
}

/*
$num1 = $_GET["num1"];
$num2 = $_GET["num2"];
*/

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];

echo soma($num1, $num2);
?>