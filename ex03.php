<?php
echo "IMPRIMINDO OS NUMEROS DIVISIVEIS POR 3 DE 1 A 50:<br>";

for($n = 1; $n <= 50; $n++){
    if(($n % 3) == 0){
        echo $n . "<br>";
    }
}
?>