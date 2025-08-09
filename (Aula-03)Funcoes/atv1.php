<?php
echo "FATORIAL DE 5 A 12<br>";
function fatorial($n){
    $fat = 1;
    for($i = 1; $i <= $n; $i++){
        $fat *= $i; 
    }
    return $fat;
}

for($i = 5; $i <= 12; $i++){
    echo $i . " = " . fatorial($i);
    echo "<br>";
}

?>