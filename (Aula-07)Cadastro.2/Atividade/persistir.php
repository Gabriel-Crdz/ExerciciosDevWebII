<?php

define("DIR_ARQUIVOS", "arquivos");

function salvarDados($array, $arq){
    $json = json_encode($array, JSON_PRETTY_PRINT); // Converte o array para JSON
    file_put_contents(DIR_ARQUIVOS . "/" . $arq, $json); // Salva o JSON
}

function buscarDados($arq) : array {
    $dados = array();
    $nomeArq = DIR_ARQUIVOS . "/" . $arq;
    
    // Busca os dados salvos
    if(file_exists($nomeArq)){
        $json = file_get_contents($nomeArq);
        $dados = json_decode($json, true);
    }
    return $dados;
}
?>