<?php
echo "IMPRIMINDO A SOMA DE 1 A 100:<br>";
$soma = 0;

for($n = 1; $n <= 100; $n++){
    $soma += $n;
}

echo $soma . "<br>";
?>