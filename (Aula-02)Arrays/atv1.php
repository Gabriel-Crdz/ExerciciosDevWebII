<?php

$bissextos = array(1988, 1992, 1996, 2000, 2004);
$primos = array(2, 3, 5, 7, 11);
$estados = array("Parana", "São Paulo", "Santa Catarina", "Rio Grande do Sul", "Pernambuco");
$oviporos = array("sapo", "aranhas", "pinguim", "barata", "ornitorrinco");

echo "4 ARRAYS DE 5 ELEMENTOS:<br>";

echo "ANOS BISSEXTOS:<br>";
echo "<ol><br>";
foreach($bissextos as $ano){
    echo "<li>". $ano . "</li><br>";
}
echo "</ol><br><br>";

echo "NUMEROS PRIMOS:<br>";
echo "<ol><br>";
foreach($primos as $n){
    echo "<li>". $n . "</li><br>";
}
echo "</ol><br><br>";

echo "ESTADOS BRASILEIROS:<br>";
echo "<ol><br>";
foreach($estados as $e){
    echo "<li>". $e . "</li><br>";
}
echo "</ol><br><br>";

echo "ANIMAIS OVIPOROS:<br>";
echo "<ol><br>";
foreach($oviporos as $a){
    echo "<li>". $a . "</li><br>";
}
echo "</ol><br><br>"
?>