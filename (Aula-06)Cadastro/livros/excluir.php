<?php
include_once("persistencia.php"); // Importa um arquivo

$livros = buscarDados("livros.json"); // Carrega os dados json

$id = $_GET["id"]; // Recebe o ID do livro

/* Buscando o livro com o ID correspondente */
$idxExcluir = -1;
foreach($livros as $idx => $livro){
    if($id == $livro["id"]){
        $idxExcluir = $idx;
        break;
    }
}

echo $idExcluir;

array_splice($livros, $idxExcluir, 1); //Remove o indice encontrado do array
salvarDados($livros, "livros.json");

header("location: livros.php"); // Retorna para a pagina principal
?>