<?php
include_once(__DIR__ . "/../../controller/PadawanController.php");
$idEx = 0;
if(isset($_GET['id'])){
    $idEx = $_GET['id'];
}else{
    echo "ERRO";
    exit;
}

$padawanCont = new PadawanController;
$padawanCont->deletar($idEx);

header("location:listar.php");
?>