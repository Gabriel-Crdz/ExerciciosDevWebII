<?php
include_once(__DIR__ . "/../dao/AlunoDao.php");
include_once(__DIR__ . "/../service/AlunoService.php");

class AlunoController{
    private AlunoDao $alunoDao;
    private AlunoService $alunoService;

    public function __construct(){
        $this->alunoDao = new AlunoDao(); // Declaração do objeto Dao
        $this->alunoService = new AlunoService(); // Declaração do objeto Service
    }

    public function listar(){ /* Metodo para listar os alunos */
        return $this->alunoDao->list(); // Retorna o metodo do Dao
    }     

    public function inserir(Aluno $aluno){
        $erros = $this->alunoService->validar($aluno); // Chamando a validação dos campos
        if(! $erros)
            $this->alunoDao->insert($aluno); // Se nao der erro insere
        
        return $erros;
    }

    public function buscarId(int $id){
        return $this->alunoDao->findId($id);
    }
    public function editar(Aluno $aluno){
        $erros = $this->alunoService->validar($aluno); // Chamando a validação dos campos
        if(! $erros)
            $this->alunoDao->update($aluno); // Se nao der erro insere
        
        return $erros;
    }

    public function deletar(int $id){
        return $this->alunoDao->delete($id);
    }
}
?>