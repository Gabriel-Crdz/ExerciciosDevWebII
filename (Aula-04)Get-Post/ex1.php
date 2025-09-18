<?php
echo "CADASTRO COM POST:<br>";

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $_POST["idade"];

echo "<span style= 'font-weight: bold'>Nome Completo: </span> " . $nome . " " . $sobrenome . "<br>";
echo "<span style= 'font-weight: bold'>Idade: </span>" . $idade;

?>