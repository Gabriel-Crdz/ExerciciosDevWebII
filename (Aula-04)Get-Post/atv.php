<?php
echo "PROGRESSÃO ARITMETICA:<br>";

function progressao($n, $r, $q){
   for($i = 1; $i <= $q; $i++){
        echo $n . "<br>";
        $n += $r;
    }
}

$inicio = $_GET["inicio"];
$razao = $_GET["razao"];
$quantidade =  $_GET["quantidade"];

if(isset($_GET["inicio"]) == False){
    echo "Termo de inicio não informado!!<br>";
}

if(isset($_GET["razao"]) == False){
    echo "Razão não informada!!<br>";
}

if(isset($_GET["quantidade"]) == False){
    echo "Quantidade de termos não informada!!<br>";
}

if(isset($_GET["quantidade"]) && isset($_GET["inicio"]) && isset($_GET["razao"])){
    echo progressao($inicio, $razao, $quantidade);
}

?>