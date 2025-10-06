<?php

include_once("Connection.php");

$conn = Connection::getConnection(); // Chama o método que cria a conexão
// print_r($conn);

$sql = "SELECT * FROM produtos";
$stm = $conn->prepare($sql); // Prepara a instrução
$stm -> execute(); // Executa a instrução

$produtos = $stm -> fetchAll(); // Retorna todos os registros encontrados
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Lista de Produtos</h2>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>uni Medida</th>
            <th>Excluir</th>
        </tr>

        <?php foreach($produtos as $p):?>
        <tr>
            <td><?= $p["id"] ?></td>
            <td><?= $p["descricao"] ?></td>
            <td><?= $p["un_medida"] ?></td>
            <td><a onclick="return confirm('Deseja excluir esse item?');" href="excluirProduto.php?id=<?= $p['id']?>">Excluir</a></td>
        </tr>
        <?php endforeach;?>
    </table>
    <a id="cadastro" href="inserirProduto.php">Inserir Produto</a>
</body>
</html>