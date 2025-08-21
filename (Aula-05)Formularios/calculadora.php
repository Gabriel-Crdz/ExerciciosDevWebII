<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h1>Formulario Calculadora</h1>
    <form action="" method="post">
        <input type="number" name="valor1" placeholder="valor 1">
        <br><br>
        <input type="number" name="valor2" placeholder="valor 2">
        <br><br>
        <select name="opc">
            <option value="">Operação</option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br><br>
        <button type="submit" name="submit">Calcular</button>
    </form>
</body>
</html>

<?php
/* Função */
function calcular($v1, $v2, $o){
    switch($o){
        case '+':
            $result = $v1 + $v2;
            break;
        
        case '-':
            $result = $v1 - $v2;
            break;
        
        case '*':
            $result = $v1 * $v2;
            break;
        
        case '/':
            if($v2 == 0){
                $result =  "Divisao Impossivel!!";
            }
            else{
                $result = $v1 / $v2;
            }
            break;

    }
    return $result;
}

/* Principal */

// Validação quando o button for clicado
if(isset($_POST["submit"])){ 

    $valor1 = $_POST["valor1"];  // Armazenando os valores das variaveis,
    $valor2 = $_POST["valor2"];  // caso não forem informadas o "submit" força elas a serem strings vazias 
    $opc = $_POST["opc"];

    /* Validação das strings vazias */
    if($valor1 == "" || $valor2 == "" || $opc == "" ){
        // Validação individual de cada variavel
        if($valor1 == "") echo "Valor 1 não informado!!<br>"; 
        if($valor2 == "") echo "Valor 2 não informado!!<br>";
        if($opc == "") echo "Operação não informada!!<br>";
    }

    else{
        echo "Resultado: " . calcular($valor1, $valor2, $opc);
    }
}

?>
