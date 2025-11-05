<?php
include_once(__DIR__ . "/../../controller/AlunoController.php");
$idEx = 0;
if(isset($_GET['id'])){
    $idEx = $_GET['id'];
}else{
    echo "ERRO";
    exit;
}

$alunoCont = new AlunoController;
$alunoCont->deletar($idEx);

header("location:listar.php");
?>