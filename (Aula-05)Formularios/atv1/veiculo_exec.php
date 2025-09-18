<?php

$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$combust = $_POST["combustivel"];

if($combust == 'A') $combust = "Alcool";
else if($combust == 'G') $combust = "Gasolina";
else if($combust == 'F') $combust = "Flex";

echo "<h1>Dados informados para o veículo</h1>";

echo "Modelo: " . $modelo . "<br>";
echo "Marca: " . $marca . "<br>";
echo "Combustível: " . $combust . "<br>";

echo "<br><br>";
echo "<a href='veiculo_form.php'>Cadastrar outro veículo</a>";

?>