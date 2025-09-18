<?php
echo "EXIBINDO NUMEROS:<br>";

$numIni = 1;
$numFim = 100;

if(isset($_GET["inicio"]) && $_GET["inicio"] >= 1) $numIni = $_GET["inicio"];
if(isset($_GET["fim"]) && $_GET["fim"] <= 100) $numFim = $_GET["fim"];

if($numIni > $numFim){
    echo "Numeros inicial maior que o numero final!!";
}

else{
    for($i = $numIni; $i <= $numFim; $i++){
        echo $i . "<br>";
    }
}

?>