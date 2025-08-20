<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterando cor de fundo</title>
</head>
<body>
    <form action="" method="post">

        <select name="escolha">
            <option value="Tomato">Vermelho</option>
            <option value="Orange">Laranja</option>
            <option value="DodgerBlue">Azul</option>
            <option value="MediumSeaGreen">Verde</option>
            <option value="Gray">Cinza</option>
            <option value="LightGray">Cinza-claro</option>
            <option value="SlateBlue">Roxo</option>
            <option value="Violet">Violeta</option>
        </select>

        <br><br>
        <button>Inserir cor</button>
    </form>
</body>
</html>

<?php

$cor = $_POST["escolha"];

echo "<body style ='background: " . $cor . "'>";

?>