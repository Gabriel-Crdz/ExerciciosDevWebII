<?php

include_once("Connection.php");

$conn = Connection::getConnection(); // Chama o método que cria a conexão
// print_r($conn);

$sql = "SELECT * FROM times";
$stm = $conn->prepare($sql); // Prepara a instrução
$stm -> execute(); // Executa a instrução

$dados = $stm -> fetchAll(); // Retorna todos os registros encontrados
// print_r($dados);
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Times</title>
</head>
<body>
    <h1>Aula banco de dados - Times</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cidade</th>
            <th>Excluir</th>
        </tr> 
        
        <?php foreach($dados as $t): ?>
        <tr>
            <td><?= $t["id"] ?></td>
            <td><?= $t["nome"]?></td>
            <td><?= $t["cidade"]?></td>
            <td><a onclick="return confirm('Confirme a exclusão');" href="timeExcluir.php?id=<?= $t['id']?>">Excluir</td>
        </tr> 
        <?php endforeach; ?>
    </table>
</body>
</html>