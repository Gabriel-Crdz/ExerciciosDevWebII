<?php
include_once(__DIR__ . "/../dao/PadawanDao.php");
include_once(__DIR__ . "/../service/PadawanService.php");

class PadawanController{
    private PadawanDao $padawanDao;
    private PadawanService $padawanService;

    public function __construct(){
        $this->padawanDao = new PadawanDao;
        $this->padawanService = new PadawanService;
    }
    public function listar(){
        return $this->padawanDao->list(); // Retorna o metodo do Dao
    }  

    public function inserir(Padawan $padawan){
        $erros = $this->padawanService->validar($padawan);

        if(!$erros) $this->padawanDao->insert($padawan); // Se nao tiver erros insere no banco

        return $erros;
    }

    public function buscarId(int $id){
        return $this->padawanDao->findId($id);
    }

    public function editar(Padawan $padawan){
        $erros = $this->padawanService->validar($padawan); // Chamando a validação dos campos
        if(!$erros) $this->padawanDao->update($padawan); // Se nao der erro atualiza cadastro
    }

    public function deletar(int $id){
        return $this->padawanDao->delete($id);
    }
}

?>