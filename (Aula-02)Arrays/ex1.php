<?php
echo "MEDIA ARITMETICA<br>";
$num = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$soma = 0;

echo "Array:<br>";
foreach($num as $n){
    echo $n . "<br>";
    $soma += $n;
}

$media = $soma / 10;
echo "Media do array: " . $media;
?>