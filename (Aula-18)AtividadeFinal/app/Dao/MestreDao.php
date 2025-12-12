<?php
namespace App\Dao;

use App\Util\Connection;
use App\Mapper\MestreMapper;
use \Exception;

class MestreDao{
    private $conn;
    private $mestreMapper;

    public function __construct(){
        $this->conn = Connection::getConnection();
        $this->mestreMapper = new MestreMapper;
    }

    public function findById($id){
        $sql = "SELECT * FROM mestre WHERE id = :id";

        $stm = $this->conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
        $result = $stm->fetchAll();

        $arrayObj = $this->mestreMapper->mapFromDatabaseArrayToObjectArray($result);

        if(count($arrayObj) == 0) return null;
        else if(count($arrayObj) > 1) new Exception("Mais de um registro encontrado no ID" . $id);
        else return $arrayObj[0];
    }

}

?>