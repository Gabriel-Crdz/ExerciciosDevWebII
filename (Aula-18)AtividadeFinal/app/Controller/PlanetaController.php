<?php
namespace App\Controller;
use App\Dao\PlanetaDao;

class PlanetaController{
    private PlanetaDao $planetaDao;

    public function __construct(){
        $this->planetaDao = new PlanetaDao(); // Declaração do objeto Dao
    }

    public function buscarPorId($id){
        return $this->planetaDao->findById($id);
    }
}

?>