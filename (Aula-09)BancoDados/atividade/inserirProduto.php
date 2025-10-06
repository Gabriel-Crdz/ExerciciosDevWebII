<?php

include_once("Connection.php");

$descricao = "";
$uni = "";

if(isset($_GET["descricao"])){
    $descricao = $_POST["descricao"];
    $uni = $_POST["un_medida"];
    // Validação dos parâmetros

    $msgErros = array();
    if($descricao == "") array_push($msgErros, "Informe a descrição do produto!");
    if($uni == "") array_push($msgErros, "Informe a unidade do produto!");

    if(empty($msgErros)){
        // Inserir o time no banco de dados
        $conn = Connection::getConnection();
        $sql = "INSERT INTO produtos(descricao, uni_medida)
                VALUES (?, ?)"; // Nao passar as variaveis como parametros diretamente no sql

        $stm = $conn->prepare($sql);
        $stm->execute(array($descricao, $uni)); // Passagem de parametros no execução com array

        header("location: listarProduto.php"); // Voltar para listagem
    }

}
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadatro de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Inserindo Produto</h2>
    <?php if (!empty($msgErros)): ?>
            <!--A div com as mensagens só aparecerá quando houver algum erro -->
            <div id="divErro"><?= $msgErros ?></div>
    <?php endif; ?>
    <form method="GET">
        <input type="text" name="descricao" value="<?= $descricao ?>" placeholder="Descrição">
        <br><br>
        <input type="text" name="uni_medida" value="<?= $uni ?>" placeholder="Unidade Medida">
        <br><br>
        <input id="enviar" type="submit" value="Enviar" />
    </form>
</body>
</html>