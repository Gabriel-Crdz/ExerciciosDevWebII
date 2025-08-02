<?php
$n = 5;
$r = 3;

echo "SEQUENCIA ARITMETICA(10 primeiros termos):<br>";
echo "PRIMEIRO TERMO: 5<br>";
echo "RAZÃO: 3<br>";

for($i = 1; $i <= 10; $i++){
    echo $n . "<br>";
    $n += $r;
}
?>