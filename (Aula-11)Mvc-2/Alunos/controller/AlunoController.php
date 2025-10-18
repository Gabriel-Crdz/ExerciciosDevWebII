<?php
include_once(__DIR__ . "/../dao/AlunoDao.php");

class AlunoController{
    private AlunoDao $alunoDao;

    public function __construct(){
        $this->alunoDao = new AlunoDao(); // Declaração do objeto Dao
    }

    public function listar(){ /* Metodo para listar os alunos */
        return $this->alunoDao->list(); // Retorna o metodo do Dao
    }     

    public function inserir(Aluno $aluno){
        return $this->alunoDao->insert($aluno);
    }

    public function deletar(int $id){
        return $this->alunoDao->delete($id);
    }
}
?>