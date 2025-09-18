<?php
echo "ARRAY INDEXADO <br>";
$nums = array(5, 16, 7, 9, 12); //Declaração

echo $nums[3] . "<br>"; // Mostrando um valor

$nums[2] = 2; // Alterando um valor

/* Imprimindo os elementos do array */
echo "usando FOR<br>";
for($i = 0; $i < count($nums); $i++){
    echo $nums[$i] . "<br>";
}

echo "usando FOREACH<br>";
foreach($nums as $n){
    echo $n . "<br>";
}
array_push($nums, 8) // Insirindo um valor ao final
?>