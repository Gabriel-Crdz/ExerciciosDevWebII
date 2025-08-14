<?php

$flores = array("Orquidea", "Margarida", "Petunia");
$frutas = array("Laranja", "Maçã", "Limão");
$cidades = array("Foz do Iguaçu", "Cascavel", "Toledo");
$turisticos = array("Itaipu", "Cataratas", "Parque das aves");

$matriz = array($flores, $frutas, $cidades, $turisticos);

echo "<table><br>";
foreach($matriz as $item){
    echo "<tr><br>";
    echo "<td>" . $item[0] ."</td>" . "<td>" . $item[1] . "</td>" ."<td>" . $item[2] . "</td>";
    echo "</tr><br>";
}
echo "</table>"
?>
