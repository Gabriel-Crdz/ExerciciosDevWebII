<?php

namespace App\Mapper;

use App\Model\Padawan;

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
        $obj = new Padawan();
        if(isset($regDatabase['id'])) $obj->setId($regDatabase['id']);
        
        if(isset($regDatabase['nome'])) $obj->setNome($regDatabase['nome']);

        if(isset($regDatabase['especie'])) $obj->setEspecie($regDatabase['epecie']);
        
        if(isset($regDatabase['idade'])) $obj->setIdade($regDatabase['idade']);

        if(isset($regDatabase('estado'))) $obj->setEstado($regDatabase['estado']);

        if(isset($regDatabase['cor_sabre'])) $obj->setSabre($regDatabase['cor_sabre']);

        if(isset($regDatabase['id_mestre'])) $obj->setMestre($regDatabase['id_mestre']);

        if(isset($regDatabase['id_planeta'])) $obj->setPlaneta($regDatabase['id_planeta']);

        return $obj;
    }

    public function mapFromJsonToObject($regJson) {
        //Reaproveita o método
        return $this->mapFromDatabaseToObject($regJson);
    }

}