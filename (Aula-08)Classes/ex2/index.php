<?php

include_once("Cidade.php");

$c1 = new Cidade("Foz do Iguaçu", 250000, 500, 145, "Parana", "PR");
$c2 = new Cidade("Cascavel", 300000, 420, 320, "Parana", "PR");
$c3 = new Cidade("Chapeco", 240000, 120, 620, "Santa Catarina", "SC");
$c4 = new Cidade("Blumenau", 330000, 200, 85, "Santa Catarina", "SC");
$c5 = new Cidade("Curitiba", 1500000, 300, 850, "Parana", "PR");

$cidades = array($c1, $c2, $c3, $c4, $c5);
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 2</title>
    <style>
        table, td, th{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: left;
            padding: 4px 0;
            padding-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Tabela das Cidades</h1>
    <table>
        <tr>
            <th>Cidade</th><th>Habitantes</th><th>Area</th><th>Altitude</th><th>Estado</th>
        </tr>
        <?php foreach($cidades as $c):?>
        <tr>
            <td><?= $c->getNomeCidade()?></td>
            <td><?= $c->getQtdHab()?></td>
            <td><?= $c->getArea() . "km²"?></td>
            <td><?= $c->getAltitude() . "km"?></td>
            <td><?= $c->getNomeEstado() . " - " . $c->getSigla()?></td>
        </tr>
    <?php endforeach;?>
    </table>
</body>
</html>