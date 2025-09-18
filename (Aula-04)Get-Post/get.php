<?php
echo "Parametros recebidos:<br>";

// ./get.php?nome=Gabriel&idade=18
$nome = $_GET["nome"]; // Passando para uma variavel
echo $nome . "<br>";

echo $_GET["idade"]; // Mostrando direto

?>