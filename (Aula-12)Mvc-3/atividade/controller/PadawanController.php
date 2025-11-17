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
}

?>