<?php
include_once(__DIR__ . "/../model/Aluno.php");

class AlunoService{
    public function validar(Aluno $aluno){
        $erros = array();

        /* Validações dos campos */
        if(!$aluno->getNome()) array_push($erros ,"Informe seu nome!"); 
        if(!$aluno->getIdade() || $aluno->getIdade() < 0) array_push($erros, "Informe sua idade!");
        if(!$aluno->getEstrangeiro()) array_push($erros, "Informe se você é estrangeiro!");
        if(!$aluno->getCurso()) array_push($erros, "Informe seu curso!");
    
        return $erros;
    }
}

?>