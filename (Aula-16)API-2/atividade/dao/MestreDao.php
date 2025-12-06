<?php
include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Mestre.php");

class MestreDao{
    private PDO $conn;

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function list(){
        $sql = "SELECT * FROM mestre ORDER BY nome";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->map($result); // Chama o metodo de mapeamento Objeto-Relacionamento
    }

    private function map(array $result){
        $mestres = array();
        foreach($result as $r){
            $mestre = new Mestre();
            $mestre->setId($r["id"]);
            $mestre->setNome($r["nome"]);
            $mestre->setTitulo($r["titulo"]);

            array_push($mestres, $mestre);
        }
        return $mestres;
    }
}

?>