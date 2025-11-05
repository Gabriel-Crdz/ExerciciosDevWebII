<?php
include_once(__DIR__ . "/../../model/Aluno.php");
include_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErros = "";
$aluno = NULL;
// Verifica se o usuario clicou no gravar
if(isset($_POST["nome"])){
    // "Ja submeteu"

    // Captura os valores do form e valida com operador ternario
    $nome = trim($_POST["nome"]) ? trim($_POST["nome"]) : NULL;
    $idade = is_numeric($_POST["idade"]) ? $_POST["idade"] : NULL;
    $estg = $_POST["estrang"] ? $_POST["estrang"] : NULL;
    $idCurso = is_numeric($_POST["curso"]) ? $_POST["curso"]: NULL;

    /* Salvando no Objeto aluno */
    $aluno = new Aluno();
    $aluno->setId(0);
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
    $alunoCont = new AlunoController();
    $erros = $alunoCont->inserir($aluno);

    if(!$erros) header("location:listar.php"); // Se nao deu erros retorna para listar.php
    else $msgErros = implode("<br>" , $erros);
}

// print_r($aluno);

include_once(__DIR__ . "/form.php");
?>