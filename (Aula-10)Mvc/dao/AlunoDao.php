<?php
include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Aluno.php");

class AlunoDao
{
    private PDO $conn;

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
}
