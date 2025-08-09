<?php

$pessoa1 = array(
    "nome" => "Manuel de Medeiros",
    "Rua" => "Rua das Acacias",
    "cidade" => "Foz do Iguaçu",
    "UF" => "PR",
);

$pessoa2 = array(
    "nome" => "Juliana de Amaral",
    "Rua" => "Rua dos Pinheiros",
    "cidade" => "Florianopolis",
    "UF" => "SC",
);

$pessoa3 = array(
    "nome" => "Rodrigo Baidek",
    "Rua" => "Rua Dom Pedro I",
    "cidade" => "Petropolis",
    "UF" => "RJ",
);

$pessoa4 = array(
    "nome" => "Fabiola da silva",
    "Rua" => "Rua Chile",
    "cidade" => "Guarulhos",
    "UF" => "SP",
);

$pessoas = array($pessoa1, $pessoa2, $pessoa3, $pessoa4);

echo "<table><br>";
echo "<tr><br>";
echo "<td>Nome</td><td>Endereço</td><td>Cidade</td><td>UF</td><br>";
echo "<tr><br>";
foreach($pessoas as $p){
    echo "<tr><br>";
    echo "<td>" . $p["nome"] . "</td>" . "<td>" . $p["Rua"] . "</td>" . "<td>" . $p["cidade"] . "</td>" . "<td>" . $p["UF"] . "</td><br>";
    echo "<tr><br>";
}
echo "</table>";
?>