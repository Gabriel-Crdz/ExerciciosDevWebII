<?php

namespace App\Mapper;

use App\Model\Padawan;
use App\Controller\MestreController;
use App\Controller\PlanetaController;

class PadawanMapper {

    public function mapFromDatabaseArrayToObjectArray($regArray) {
        $arrayObj = array();

        foreach($regArray as $reg) {
            $regObj = $this->mapFromDatabaseToObject($reg);
            array_push($arrayObj, $regObj); 
        }

        return $arrayObj;
    }

    public function mapFromDatabaseToObject($regDatabase) {
        $padawan = new Padawan();
        if(isset($regDatabase['id'])) $padawan->setId($regDatabase['id']);
        
        if(isset($regDatabase['nome'])) $padawan->setNome($regDatabase['nome']);

        if(isset($regDatabase['especie'])) $padawan->setEspecie($regDatabase['especie']);
        
        if(isset($regDatabase['idade'])) $padawan->setIdade($regDatabase['idade']);

        if(isset($regDatabase['estado'])) $padawan->setEstado($regDatabase['estado']);

        if(isset($regDatabase['cor_sabre'])) $padawan->setSabre($regDatabase['cor_sabre']);

        if(isset($regDatabase['id_mestre'])){
            $mestreCont = new MestreController;
            $mestre = $mestreCont->buscarPorId($regDatabase['id_mestre']);
            $padawan->setMestre($mestre);
        }

        if(isset($regDatabase['id_planeta'])){
            $planetaCont = new PlanetaController;
            $planeta = $planetaCont->buscarPorId($regDatabase['id_planeta']);
            $padawan->setPlaneta($planeta);
        }

        return $padawan;
    }

    public function mapFromJsonToObject($regJson) {
        //Reaproveita o método
        return $this->mapFromDatabaseToObject($regJson);
    }

}