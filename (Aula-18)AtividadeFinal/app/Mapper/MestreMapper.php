<?php
namespace App\Mapper;
use App\Model\Mestre;

class MestreMapper {
    public function mapFromDatabaseArrayToObjectArray($regArray) {
        $arrayObj = array();

        foreach($regArray as $reg) {
            $regObj = $this->mapFromDatabaseToObject($reg);
            array_push($arrayObj, $regObj); 
        }

        return $arrayObj;
    }

    public function mapFromDatabaseToObject($regDatabase) {
        $mestre = new Mestre();

        if(isset($regDatabase['id'])) $mestre->setId($regDatabase['id']);
        if(isset($regDatabase['nome'])) $mestre->setNome($regDatabase['nome']);
        if(isset($regDatabase['titulo'])) $mestre->setTitulo($regDatabase['titulo']);

        return $mestre;
    }
}
?>