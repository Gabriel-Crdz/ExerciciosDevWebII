<?php
function calcular($v1, $v2, $o){
    return v1 + v2;

}


$valor1 = $_POST["valor1"];
$valor2 = $_POST["valor2"];
$opc = $_POST["operacao"];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <form action="" method="">
        <input type="number" name="valor1" placeholder="valor 1">
        <br><br>
        <input type="number" name="valor2" placeholder="valor 2">
        <br><br>
        <select>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="\">\</option>
        </select>
    </form>
</body>
</html>
