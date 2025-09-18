<?php
echo "CALCULOS DO CIRCULO:<br>";

function calculoArea($p , $r){
    return $p * $r * $r;
}

function calculoCirc($p, $r){
    return 2 * $p *$r;
}
$pi = 3.14;

echo "Circulo 1: raio = 3<br>";
echo "Area: " . calculoArea($pi, 3) . "<br>";
echo "Circunferencia: " . calculoCirc($pi, 3) . "<br>";
 
echo "<br>Circulo 2: raio = 5<br>";
echo "Area: " . calculoArea($pi, 5) . "<br>";
echo "Circunferencia: " . calculoCirc($pi, 5) . "<br>";

echo "<br>Circulo 3: raio = 20<br>";
echo "Area: " . calculoArea($pi, 20) . "<br>";
echo "Circunferencia: " . calculoCirc($pi, 20) . "<br>";

?>