<?php

namespace App\Service;

use App\Model\Padawan;

class PadawanService{
    public function validar(Padawan $padawan){
        if(!$padawan->getNome()) return "O campo nome é obrigatório.";
            
        if(!$padawan->getEspecie()) return "O campo especie é obrigatório.";
        
        if(!$padawan->getIdade()) return "O campo idade é obrigatório.";

        if(!$padawan->getEstado()) return "O campo estado é obrigatório.";
        
        if(!$padawan->getSabre()) return "O campo sabre é obrigatório.";

        if(!$padawan->getMestre()) return "O campo mestre é obrigatório.";

        if(!$padawan->getPlaneta()) return "O campo planeta é obrigatório.";
        
        return null;
    }
}

?>