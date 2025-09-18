<?php
echo "ARRAY ASSOCIATIVO <br>";

$pessoa = array(
    "nome" => "Daniel",
    "idade" => 27,
);

echo $pessoa["nome"] . "<br>"; // Mostrando um elemento

/*Imprimindo com Foreach */
echo "USANDO FOREACH <br>";
foreach($pessoa as $p){
    echo $p . "<br>";
}

$pessoa2 = array(
    "nome" => "Julia",
    "idade" => 18,
);

$pessoas = array($pessoa, $pessoa2);

foreach($pessoas as $pessoa){
    echo $pessoa["nome"] . " - " . $pessoa["idade"];
} 
?>