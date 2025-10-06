<?php

include_once("Connection.php");

// Validação dos parâmetros
if(!isset($_GET["nome"]) || !isset($_GET["cidade"])){
    echo "ERRO: Informe os parametros nome e cidade!!";
    exit;
}

// Receber o nome e a cidade do time por parâmetro GET
$nome = $_GET["nome"];
$cidade = $_GET["cidade"];

// Inserir o time no banco de dados
$conn = Connection::getConnection();
$sql = "INSERT INTO times(nome, cidade)
        VALUES (?, ?)"; // Nao passar as variaveis como parametros diretamente no sql

$stm = $conn->prepare($sql);
$stm->execute(array($nome, $cidade)); // Passagem de parametros no execução com array

header("location: timeListar.php"); // Voltar para listagem
?>