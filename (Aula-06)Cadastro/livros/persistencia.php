<?php

define("DIR_ARQUIVOS", "arquivos"); // Constante do diretorio

function salvarDados($array, $arq){
    $json = json_encode($array, JSON_PRETTY_PRINT); // Converte o array para JSON(string)

   file_put_contents(DIR_ARQUIVOS . "/" . $arq, $json); // Salva o JSON no diretorio arquivos
}

function buscarDados($arq) : array {
    $dados = array();

    /* Buscando os dados do arquivo */
    $nomeArquivo = DIR_ARQUIVOS . "/" . $arq; // Diretorio
    if(file_exists($nomeArquivo)){
       $json = file_get_contents($nomeArquivo); // Retorna o conteudo do arquivo
       $dados = json_decode($json, true); // Converte o json para um array associativo
    }

    return $dados; // Retorna o array
}
?> 