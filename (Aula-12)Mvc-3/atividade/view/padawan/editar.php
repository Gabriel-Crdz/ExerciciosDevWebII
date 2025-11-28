<?php

include_once(__DIR__ . "/../../controller/PadawanController.php");

$padawanCont = new PadawanController;
$msgErros = "";
$padawan = NULL;
// Verifica se o usuario clicou no gravar
if(isset($_POST["nome"])){
    // Já Enviou

    /* Captura dos valores do form + validação previa */
    $id = $_POST['id'];
    $nome = trim($_POST["nome"]) ? trim($_POST["nome"]) : NULL;
    $especie = trim($_POST["especie"]) ? trim($_POST["especie"]) : NULL;
    $idade = is_numeric($_POST["idade"]) ? $_POST["idade"] : NULL;
    $status = $_POST["status"] ? $_POST["status"] : NULL;
    $idMestre = is_numeric($_POST["mestre"]) ? $_POST["mestre"]: NULL;
    $idPlaneta = is_numeric($_POST["planeta"]) ? $_POST["planeta"] : NULL;

    /* Salvado no Objeto Padawan */
    $padawan = new Padawan();
    $padawan->setId($id);
    $padawan->setNome($nome);
    $padawan->setEspecie($especie);
    $padawan->setIdade($idade);
    $padawan->setStatus($status);

    if($idMestre){ // Salva o ID do mestre
        $mestre = new Mestre();
        $mestre->setId($idMestre);
        $padawan->setMestre($mestre);
    }
    else $padawan->setMestre(NULL);

    if($idPlaneta){ // Salva o ID do planeta
        $planeta = new Planeta;
        $planeta->setId($idPlaneta);
        $padawan->setPlaneta($planeta);
    }
    else $padawan->setPlaneta(NULL);

    $padawanCont->editar($padawan);

    if(!$erros) header("location:listar.php"); // Se nao tiver erros retorna para listar.php
    else $msgErros = implode("<br>" , $erros);
}
else{
    if(isset($_GET['id'])) $id = $_GET['id'];

    $padawan = $padawanCont->buscarId($id); // Procura pelo ID do padawan para editar
    if(!$padawan){
        echo "Padawan não encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

// print_r($padawan);

include_once(__DIR__ . "/form.php");
?>