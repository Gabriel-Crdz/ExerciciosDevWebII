<?php
include_once(__DIR__ . "/../dao/MestreDao.php");

class MestreController{
    private MestreDao $mestreDao;

    public function __construct(){
        $this->mestreDao = new MestreDao(); 
    }

    public function listar(){
        return $this->mestreDao->list();
    }
}
?>