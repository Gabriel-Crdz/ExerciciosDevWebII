<?php
include_once("Connection.php");

if(!isset($_GET["id"])){
    echo "ERRO: ID não encontrado!!";
    exit;
}

$Exid = $_GET["id"];

$conn = Connection::getConnection();

$sql = " DELETE FROM produtos WHERE id = ?;";
$stm = $conn->prepare($sql); // Prepara a instrução
$stm -> execute(array($Exid)); // Executa a instrução

header("location: listarProduto.php");
?>