<?php
namespace App\Mapper;
use App\Model\Planeta;

class PlanetaMapper{
    public function mapFromDatabaseArrayToObjectArray($regArray) {
        $arrayObj = array();

        foreach($regArray as $reg) {
            $regObj = $this->mapFromDatabaseToObject($reg);
            array_push($arrayObj, $regObj); 
        }

        return $arrayObj;
    }

    public function mapFromDatabaseToObject($regDatabase) {
        $planeta = new Planeta();

        if(isset($regDatabase['id'])) $planeta->setId($regDatabase['id']);
        if(isset($regDatabase['nome'])) $planeta->setNome($regDatabase['nome']);
        if(isset($regDatabase['quadrante'])) $planeta->setQuad($regDatabase['quadrante']);
        if(isset($regDatabase['regiao'])) $planeta->setRegiao($regDatabase['regiao']);

        return $planeta;
    }
}

?>