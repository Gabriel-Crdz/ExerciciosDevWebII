<?php
include_once(__DIR__ . "/../../model/Padawan.php");
include_once(__DIR__ . "/../../controller/PadawanController.php");

$msgErros = "";
$padawan = NULL;
// Verifica se o usuario clicou no gravar
if(isset($_POST["nome"])){
    // Já Enviou

    /* Captura dos valores do form + validação */
    $nome = trim($_POST["nome"]) ? trim($_POST["nome"]) : null;
    $especie = trim($_POST["especie"]) ? trim($_POST["especie"]) : null;
    $idade = is_numeric($_POST["idade"]) ? $_POST["idade"] : null;
    $status = $_POST["status"] ? $_POST["status"] : null;
    $idMestre = is_numeric($_POST["mestre"]) ? $_POST["mestre"]: null;
    $idPlaneta = is_numeric($_POST["planeta"]) ? $_POST["planeta"] : null;

    /* Salvado no Objeto Padawan */
    $padawan = new Padawan();
    $padawan->setId(0);
    $padawan->setNome($nome);
    $padawan->setEspecie($especie);
    $padawan->setIdade($idade);
    $padawan->setStatus($status);

    if($idMestre){ // Validação do mestre
        $mestre = new Mestre();
        $mestre->setId($idMestre);
        $padawan->setMestre($mestre);
    }
    else $padawan->setMestre(null);

    if($idPlaneta){ // Validação de planeta
        $planeta = new Planeta;
        $planeta->setId($idPlaneta);
        $padawan->setPlaneta($planeta);
    }
    else $padawan->setPlaneta(null);

    $padawanCont = new PadawanController();
    $erros = $padawanCont->inserir($padawan);

    if(!$erros) header("location:listar.php"); // Se nao dar erro retorna para listar.php
    else $msgErros = implode("<br>" , $erros);
}

// print_r($padawan);

include_once(__DIR__ . "/form.php");
?>