<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistencia.php");

$dinos = buscarDados("dinos.json"); // Carrega os dados

$id = $_GET["id"];

/* Encontrar a posição do item a ser excluido */
$excluir = -1;
foreach($dinos as $pos => $d){
    if($id == $d["id"]){
        $excluir = $pos;
        break;
    }
}

array_splice($dinos, $excluir, 1); // Remove o indice encontrado

salvarDados($dinos, "dinos.json"); // Salva as alterações

header("location: formulario.php"); // Redireciona para o formulario

?>