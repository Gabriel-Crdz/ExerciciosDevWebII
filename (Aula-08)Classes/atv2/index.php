<?php

include_once("Livro.php");

$l1 = new Livro("A Guerra dos tronos", "George R.R.Martin", "Romance", 600);
$l2 = new Livro("Alienista", "Machado de Asis", "Romance", 304);
$l3 = new Livro("Noite na Taverna", "Alvares Machado", "Antologia", 160);

$arraylivros = array($l1, $l2, $l3);
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table{
            border: 1px black solid;
            border-collapse: collapse;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
        th{
            border: 1px black solid;
            background-color: darkorange;
            font-weight: bold;
        }
        td{
            border: 1px black solid;
            padding: 5px;
        }
    </style>
    <title>Ex2</title>
</head>
<body>
    <table>
        <tr>
            <th>titulo</th><th>Autor</th><th>Genero</th><th>qtdPaginas</th>
        </tr>
        <?php foreach($arraylivros as $l):?>
        <tr>
            <td><?= $l->getTitulo()?></td>
            <td><?= $l->getAutor()?></td>
            <td><?= $l->getGenero()?></td>
            <td><?= $l->getQtdPaginas()?></td>
        </tr>
    <?php endforeach;?>
    </table>
</body>
</html>