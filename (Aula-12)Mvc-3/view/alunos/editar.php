<?php

include_once(__DIR__ . "/../../controller/AlunoController.php");

$AlunoCont = new AlunoController;
$msgErros = "";
$aluno = NULL;

// Já clicou no gravar
if(isset($_POST["nome"])){
    $id = $_POST["id"];
    $nome = trim($_POST["nome"]) ? trim($_POST["nome"]) : NULL;
    $idade = is_numeric($_POST["idade"]) ? $_POST["idade"] : NULL;
    $estg = $_POST["estrang"] ? $_POST["estrang"] : NULL;
    $idCurso = is_numeric($_POST["curso"]) ? $_POST["curso"]: NULL;

    /* Salvando no Objeto aluno */
    $aluno = new Aluno();
    $aluno->setId($id);
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estg);

    if($idCurso){ // Validação do curso
        $curso = new Curso();
        $curso->setId($idCurso);
        $aluno->setCurso($curso);
    }
    else{ // Caso o curso nao seja preenchido
        $aluno->setCurso(NULL);
    }
    // print_r($aluno);
    $AlunoCont->editar($aluno);
    if(!$erros) header("location:listar.php"); // Se nao deu erros retorna para listar.php
    else $msgErros = implode("<br>" , $erros);
}
// Abriu o formulario para editar
else{
    if(isset($_GET['id'])) $id = $_GET['id'];

    $aluno = $AlunoCont->buscarId($id);
    if(!$aluno){
        echo "Aluno não encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}
include_once(__DIR__ . "/form.php");

?>