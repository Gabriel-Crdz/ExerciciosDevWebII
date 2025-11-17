<?php
include_once(__DIR__ . "/../dao/PadawanDao.php");

class PadawanController{
    private PadawanDao $padawanDao;

    public function __construct(){
        $this->padawanDao = new PadawanDao;
    }
    public function listar(){ /* Metodo para listar os alunos */
        return $this->padawanDao->list(); // Retorna o metodo do Dao
    }  
}


?>