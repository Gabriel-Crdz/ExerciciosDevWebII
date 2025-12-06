<?php
include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Planeta.php");

class PlanetaDao{
    private PDO $conn; // Atributo de conexão

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function list(){
        $sql = "SELECT * FROM planeta;";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->map($result); // Chama o metodo de mapeamento Objeto-Relacionamento
    }

    private function map(array $result){
        $planetas = array();
        foreach($result as $r){
            $planeta = new Planeta();
            $planeta->setId($r["id"]);
            $planeta->setNome($r["nome"]);
            $planeta->setRegiao($r["regiao"]);
            $planeta->setQuad($r["quadrante"]);

            array_push($planetas, $planeta);
        }
        return $planetas;
    }
}


?>