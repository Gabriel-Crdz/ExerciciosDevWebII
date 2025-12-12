<?php

namespace App\Dao;

use App\Util\Connection;
use App\Mapper\PadawanMapper;
use App\Model\Padawan;

use \Exception;

class PadawanDao{
    private $conn; // Atributo de conexão
    private $padawanMapper;

    public function __construct(){
        $this->conn = Connection::getConnection();
        $this->padawanMapper = new PadawanMapper();
    }

    public function list(){
        $sql = "SELECT * FROM padawan ORDER BY id;";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->padawanMapper->mapFromDatabaseArrayToObjectArray($result); // Chama o metodo de mapeamento Objeto-Relacionamento
    }

    public function insert(Padawan $padawan){
        $sql = "INSERT INTO padawan(nome, especie, idade, cor_sabre, estado, id_mestre, id_planeta)
            VALUES(:nome, :especie, :idade, :cor_sabre, :estado, :id_mestre, :id_planeta)";
        $stm = $this->conn->prepare($sql);
        $stm->bindValue("nome", $padawan->getNome());
        $stm->bindValue("especie", $padawan->getEspecie());
        $stm->bindValue("idade", $padawan->getIdade());
        $stm->bindValue("cor_sabre", $padawan->getSabre());
        $stm->bindValue("estado", $padawan->getEstado());
        $stm->bindValue("id_mestre", $padawan->getMestre()->getId());
        $stm->bindValue("id_planeta", $padawan->getPlaneta()->getId());
        $stm->execute();

        $id = $this->conn->lastInsertId();
        $padawan->setId($id);
        return $padawan;

    }
    public function findById(int $id){
        $sql = "SELECT * FROM padawan WHERE id = :id";

        $stm = $this->conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
        $result = $stm->fetchAll();

        $arrayObj = $this->padawanMapper->mapFromDatabaseArrayToObjectArray($result);

        if(count($arrayObj) == 0) return null; // Retorna null por nao tem padawan
        else if(count($arrayObj) > 1) new Exception("Mais de um registro encontrado no ID" . $id);
        else return $arrayObj[0]; // Retorna o padawan
    }

    public function update(Padawan $padawan){
        $sql = 'UPDATE padawan SET nome = :nome, especie = :especie, idade = :idade, estado = :estado, cor_sabre = :cor_sabre, id_mestre = :id_mestre, id_planeta = :id_planeta WHERE id = :id';
        $stm = $this->conn->prepare($sql);
        $stm->bindValue("nome", $padawan->getNome());
        $stm->bindValue("especie", $padawan->getEspecie());
        $stm->bindValue("idade", $padawan->getIdade());
        $stm->bindValue("estado", $padawan->getEstado());
        $stm->bindValue("cor_sabre", $padawan->getSabre());
        $stm->bindValue("id_mestre", $padawan->getMestre()->getId());
        $stm->bindValue("id_planeta", $padawan->getPlaneta()->getId());
        $stm->bindValue("id", $padawan->getId());

        $stm->execute();

        return $padawan;
    }

    public function delete(int $id){
        $sql = 'DELETE FROM padawan WHERE id = :id';

        $stm = $this->conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }
}
?>