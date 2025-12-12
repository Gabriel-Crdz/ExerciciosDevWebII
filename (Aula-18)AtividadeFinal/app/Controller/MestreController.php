<?php
namespace App\Controller;
use App\Dao\MestreDao;

class MestreController{
    private MestreDao $mestreDao;

    public function __construct(){
        $this->mestreDao = new MestreDao(); 
    }

    public function buscarPorId($id){
        return $this->mestreDao->findById($id);
    }
}
?>