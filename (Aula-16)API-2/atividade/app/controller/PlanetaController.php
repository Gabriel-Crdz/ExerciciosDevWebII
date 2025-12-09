<?php
include_once(__DIR__ . "/../dao/PlanetaDao.php");

class PlanetaController{
    private PlanetaDao $planetaDao;

    public function __construct(){
        $this->planetaDao = new PlanetaDao(); // Declaração do objeto Dao
    }

    public function listar(){
        return $this->planetaDao->list(); // Retorna o metodo do Dao
    }
}

?>