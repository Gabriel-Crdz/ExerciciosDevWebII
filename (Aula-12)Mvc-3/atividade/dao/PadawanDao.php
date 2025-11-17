<?php
include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Padawan.php");

class PadawanDao{
    private PDO $conn; // Atributo de conexão

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function list(){
        $sql = "SELECT pa.*, m.nome nome_mestre, m.titulo titulo_mestre, pl.nome nome_planeta, pl.quadrante quad,
        FROM padawan pa 
        JOIN mestre m ON (m.id = pa.id_mestre)
        JOIN planeta pl ON (pl.id = pa.id_planeta);";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result); // Chama o metodo de mapeamento Objeto-Relacionamento
    }

    private function map(array $result){
        $padawans = array();

        foreach($result as $r){
            $padawan = new Padawan();
            $mestre = new Mestre();
            $planeta = new Planeta();

            $padawan->setId($r['id']);
            $padawan->setNome($r['nome']);
            $padawan->setEspecie($r['especie']);
            $padawan->setStatus($r['status']);

            $mestre->setId($r['id_mestre']);
            $mestre->setNome($r['nome_mestre']);
            $mestre->setTitulo($r['titulo_mestre']);

            $planeta->setId($r['id_planeta']);
            $planeta->setNome($r['nome_planeta']);
            $planeta->setQuad($r['quad']);
            $planeta->setRegiao($r['regiao']);

            $padawan->setMestre($mestre);
            $padawan->setPlaneta($planeta);

            array_push($padawans, $padawan);
        }
        return $padawans;
    }
}
?>