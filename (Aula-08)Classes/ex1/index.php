<?php

include_once("Retangulo.php");

$r1 = new Retangulo(12, 3);
$r2 = new Retangulo(27, 4);
$r3 = new Retangulo(15, 19);

$retangulos = array($r1, $r2, $r3);
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 1</title>
    <style>
        table, td, th{
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Tabela de Retangulos</h1>
    <table>
        <tr>
            <th>Base</th><th>Altura</th><th>Area</th><th>Perimetro</th>
        </tr>
        <?php foreach($retangulos as $r):?>
        <tr>
            <td><?= $r->getBase()?></td>
            <td><?= $r->getAltura()?></td>
            <td><?= $r->getArea()?></td>
            <td><?= $r->getPerimetro()?></td>
        </tr>
    <?php endforeach;?>
    </table>
</body>
</html>