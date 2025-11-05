<?php
include_once(__DIR__ . "/../dao/CursoDao.php");

class CursoController{
    private CursoDao $cursoDao;

    public function __construct(){
        $this->cursoDao = new CursoDao(); // Declaração do objeto Dao
    }

    public function listar(){ /* Metodo para listar os cursos */
        return $this->cursoDao->list(); // Retorna o metodo do Dao
    }
}

?>