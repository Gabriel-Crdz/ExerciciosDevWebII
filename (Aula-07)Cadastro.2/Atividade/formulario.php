<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistir.php");

//Buscar os dados salvos
$dinos = buscarDados("dinos.json");

/* Declaração das variaveis inicialmente vazias */
$msgErro = "";
$nome = "";
$nomeCientif = "";
$grupo =  "";
$periodo =  "";

if(isset($_POST["$nome"])){
    // Enviou
    $nome = trim($_POST['nome']);
    $nomeCientif = trim($_POST['nomeCientif']);
    $grupo = trim($_POST['grupo']);
    $periodo = $_POST['periodo'];

    /*Validação dos campos */
    $erros = array();

    if($nome == "") array_push($erros, "Nome não informado!");
    if($nomeCientif == "") array_push($erros, "Nome Cientifico não informado!");
    if($grupo == "") array_push($erros, "Grupo não informado!");
    if($periodo == "") array_push($erros, "Periodo não informado!");

    if(empty($erros)){
        $dino = array(
            "id" => uniqid(),
            "nome" => $nome,
            "nomeCientif" => $nomeCientif,
            "grupo" => $grupo,
            "periodo" => $periodo
        );

        array_push($dinos, $dino);
        salvarDados($dinos, "dinos.json");

        //Forçar o recarremento para evitar o reenvio do form
        // header("location: formulario.php");
    }
    else{
        $msgErro = implode("<br>", $erros);
    }
}

?>

<!--HTML-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro Dinos</title>
</head>
<body>
    <h2>Cadastro Dinossauros</h2>

    <div class="divErro"> <?= $msgErro ?>
       <!--Mensagens de Erro apareceram aqui-->
    </div>

    <form method="POST">
        <input id="nome" name="nome" placeholder="Nome" value="<?= $nome ?>">
        <br><br>
        <input id="nomeCientif" name="nomeCientif" placeholder="Nome Cientifico" value="<?= $nomeCientif ?>">
        <br><br>
        <select name="grupo">
            <option value="" >Grupo pertencente:</option>
            <option value="ST" <?= $grupo == 'ST'? 'selected': '' ?>>Saurischia-Theropoda</option>
            <option value="SS" <?= $grupo == 'SS'? 'selected': '' ?>>Saurischia-Sauropodomorpha</option>
            <option value="OC" <?= $grupo == 'OC'? 'selected': '' ?>>Ornithischia-Cerapoda</option>
            <option value="OT" <?= $grupo == 'OT'? 'selected': '' ?>>Ornithischia-Thyreophora</option>
        </select>
        <br><br>
        <label>Periodo da Era Mesozoica:</label>
        <div id="radio">
            <input type="radio" name="periodo" value="T" <?= $periodo == 'T'? 'checked': '' ?>>Triássico
            <input type="radio" name="periodo" value="J" <?= $periodo == 'J'? 'checked': '' ?>>Jurássico
            <input type="radio" name="periodo" value="C" <?= $periodo == 'C'? 'checked': '' ?>>Cretáceo
        </div>
        <input id="enviar" type="submit" value="Enviar" />
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Nome Cientifico</th>
            <th>Grupo</th>
            <th>Periodo</th>
            <th>Excluir</th>
        </tr>

        <?php foreach ($dinos as $d): ?>
            <tr>
                <td><?php echo $d['id'] ?></td>
                <td><?= $d['nome'] ?></td>
                <td><?= $d['nomeCientif'] ?></td>
                <td><?php
                    /* Abrevie o começo para não ficar muito grande */
                    if($d['grupo'] == 'ST') echo "S-Theropoda";
                    elseif($d['grupo'] == 'SS') echo "S-Sauropodomorpha";
                    elseif($d['grupo'] == 'OC') echo "O-Cerapoda";
                    elseif($d['grupo'] == 'OT') echo "O-Thyreophora";
                    ?>
                </td>
                <td><?= $d['periodo'] ?></td>
                <td>
                    <a href="excluir.php?id=<?= $d['id'] ?>"
                        onclick="return confirm('Confirma a exclusão?')">
                        Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>