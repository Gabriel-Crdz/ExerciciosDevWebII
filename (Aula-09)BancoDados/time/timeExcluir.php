<?php
include_once("Connection.php");

if(!isset($_GET["id"])){
    echo "ERRO: ID não encontrado!!";
}

$Exid = $_GET["id"];

$conn = Connection::getConnection();

$sql = " DELETE FROM times WHERE id = ?;";
$stm = $conn->prepare($sql); // Prepara a instrução
$stm -> execute(array($Exid)); // Executa a instrução

header("location: timeListar.php");
?>