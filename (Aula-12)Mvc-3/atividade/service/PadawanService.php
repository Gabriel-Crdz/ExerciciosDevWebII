<?php
include_once(__DIR__ . "/../model/Padawan.php");

class PadawanService{
    public function validar(Padawan $padawan){
        $erros = array();

        /* Validações dos campos */
        if(!$padawan->getNome()) array_push($erros, "Informe o nome!");
        if(!$padawan->getEspecie()) array_push($erros, "Informe a especie!");
        if(!$padawan->getIdade()  || $padawan->getIdade() < 0) array_push($erros, "Informe a idade");
        if(!$padawan->getStatus()) array_push($erros ,"Informe o status atual!");
        if(!$padawan->getMestre()) array_push($erros, "Informe o mestre!");
        if(!$padawan->getPlaneta()) array_push($erros, "Informe o planeta de origem!");
        
        return $erros;
    }
}

?>