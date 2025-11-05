<?php
include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Aluno.php");

class AlunoDao
{
    private PDO $conn; // Atributo de conexão

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function list(){
        $sql = "SELECT a.*, c.nome nome_curso, c.turno turno_curso FROM alunos a JOIN cursos c ON (c.id = a.id_curso);";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result); // Chama o metodo de mapeamento Objeto-Relacionamento
    }

    private function map(array $result){ // Conversão do array => objeto
        $alunos = array();

        foreach ($result as $r) {
            $aluno = new Aluno(); // Cria onjeto aluno
            $curso = new Curso(); // Cria objeto curso

            $aluno->setId($r["id"]);
            $aluno->setNome($r["nome"]);
            $aluno->setIdade($r["idade"]);
            $aluno->setEstrangeiro($r["estrangeiro"]);
            $curso->setId($r["id_curso"]);
            $curso->setNome($r["nome_curso"]);
            $curso->setTurno($r["turno_curso"]);
            $aluno->setCurso($curso);


            array_push($alunos, $aluno); // Salva o aluno no array alunos
        }
        return $alunos;
    }

    public function insert(Aluno $aluno){
        try{
            $sql = "INSERT INTO alunos(nome, idade, estrangeiro, id_curso) 
                    VALUES (?, ?, ?, ?)";
            $stm = $this->conn->prepare($sql);
            $stm->execute(
                array($aluno->getNome(), $aluno->getIdade(), $aluno->getEstrangeiro(),$aluno->getCurso()->getId()));
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function findId(int $id){
        $sql = "SELECT 
            a.*, c.nome nome_curso, c.turno turno_curso 
            FROM alunos a 
            JOIN cursos c ON (c.id = a.id_curso) 
            WHERE a.id=?;";

        $stm = $this->conn->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();
        $alunos =  $this->map($result);

        if(count($alunos) == 1) return $alunos[0]; // Retorna um objeto aluno

        return NULL; // Retorna null por nao possuir o aluno
    }

    public function update(Aluno $aluno) {
        try {
            $sql = "UPDATE alunos 
                    SET nome = ?, idade = ?, 
                        estrangeiro = ?, id_curso = ? 
                    WHERE id = ?";
            $stm = $this->conn->prepare($sql);
            $stm->execute(array($aluno->getNome(), $aluno->getIdade(), $aluno->getEstrangeiro(), $aluno->getCurso()->getId(), $aluno->getId()));
        } catch(PDOException $e) {
            die($e->getMessage());
        }                   
    }

    public function delete(int $id){
        try{
            $sql = "DELETE FROM alunos WHERE id=?";
            $stm = $this->conn->prepare($sql);
            $stm->execute(array($id));
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }
}
