<?php
echo "CALCULOS DO RETANGULO:<br>";

function calculoArea($b, $h){
    return $b * $h;
}

function calculoPerimetro($b, $h){
    return $b * 2 + $h * 2;
}

echo "Retangulo 1: base = 12, altura = 36:<br>";
echo "Area: " . calculoArea(12, 36) . "<br>";
echo "Perimetro: " . calculoPerimetro(12, 36) . "<br>";
 
echo "<br>Retangulo 2: base = 3, altura = 5:<br>";
echo "Area: " . calculoArea(3, 5) . "<br>";
echo "Perimetro: " . calculoPerimetro(3, 5) . "<br>";

echo "<br>Retangulo 3: base = 20, altura = 10:<br>";
echo "Area: " . calculoArea(20, 10) . "<br>";
echo "Perimetro: " . calculoPerimetro(20, 10) . "<br>";
?>