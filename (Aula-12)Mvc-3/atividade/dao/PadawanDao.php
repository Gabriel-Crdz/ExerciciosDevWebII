<?php
include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Padawan.php");

class PadawanDao{
    private PDO $conn; // Atributo de conexão

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function list(){
        $sql = "SELECT pa.*, m.nome nome_mestre, m.titulo titulo_mestre, pl.nome nome_planeta, pl.quadrante quad
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

    public function insert(Padawan $padawan){
        $dados = array($padawan->getNome(),$padawan->getEspecie(), $padawan->getIdade(),
                    $padawan->getStatus(), $padawan->getMestre()->getId(), $padawan->getPlaneta()->getId());
        try{
            $sql = "INSERT INTO padawan(nome, especie, idade, status, id_mestre, id_planeta)
                VALUES(?, ?, ?, ?, ?, ?)";
            $stm = $this->conn->prepare($sql);
            $stm->execute($dados);
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function findId(int $id){
        $sql = "SELECT pa.*, m.nome nome_mestre, m.titulo titulo_mestre, pl.nome nome_planeta, pl.quadrante quad
        FROM padawan pa 
        JOIN mestre m ON (m.id = pa.id_mestre)
        JOIN planeta pl ON (pl.id = pa.id_planeta)
        WHERE pa.id=?;";

        $stm = $this->conn->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();
        $padawans = $this->map($result);;

        if(count($padawans) == 1) return $padawans[0]; // Retorna um objeto aluno
        return NULL; // Retorna null por nao possuir o aluno
    }

    public function update(Padawan $padawan){
        $dados = array($padawan->getNome(),$padawan->getEspecie(), $padawan->getIdade(),
                    $padawan->getStatus(), $padawan->getMestre()->getId(), $padawan->getPlaneta()->getId(), $padawan->getId());
        try{
            $sql = "UPDATE padawan
                    SET nome = ?, especie = ?, idade = ?, status = ?, id_mestre = ?, id_planeta = ? 
                    WHERE id = ?";
            $stm = $this->conn->prepare($sql);
            $stm->execute($dados);
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function delete(int $id){
        try{
            $sql = "DELETE FROM padawan WHERE id=?";
            $stm = $this->conn->prepare($sql);
            $stm->execute(array($id));
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
}
?>