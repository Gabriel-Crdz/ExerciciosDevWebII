<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistencia.php");

//Buscar os livros já salvos no arquivo
$livros = buscarDados("livros.json");
//echo "<pre>" . print_r($livros, true) . "</pre>";

/* Declaração das variaveis inicialmente vazias */
$msgErro = "";
$titulo = "";
$autor = "";
$genero =  "";
$numPaginas =  "";

if(isset($_POST['titulo'])) {
    //Já clicou no Enviar
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $genero = trim($_POST['genero']);
    $numPaginas = $_POST['numPaginas'];

    //echo $titulo . " - " . $genero . "- " . $numPaginas;

    /* Validação dos campos */
    $erros = array();

    if($titulo == ''){
        array_push($erros ,"Informe o titulo!");
    }
    else if(strlen($titulo) <= 3) array_push($erros, "Informe um titulo com mais de 3 caracteres!");

    if($autor == ""){
        array_push($erros ,"Informe o autor!");; 
    }


    if($genero == ""){
        array_push($erros ,"Informe o genero!");
    }

    if($numPaginas == ""){
        array_push($erros ,"Informe o numero de paginas!");
    }
    else if($numPaginas < 0) array_push($erros, "Informe um numero de paginas validas!");

    // Se tudo valido, salva arquivo
    if(empty($erros)){
        $livro = array(
            "id" => uniqid(),
            "autor" => $autor,
            "titulo" => $titulo,
            "genero" => $genero,
            "paginas" => $numPaginas
        );

        array_push($livros, $livro);
        salvarDados($livros, "livros.json");

        //Forçar o recarremento para evitar o reenvio do form
        header("location: livros.php");
    }
    else{
        $msgErro = implode("<br>", $erros);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
</head>
<body>

<h1>Cadastro de livros</h1>

<h3>Cadastre seu livro aqui</h3>
<!-- <form method="POST" onsubmit="return validar(); --> <!-- Validação JS -->
<form method="POST"> <!-- Validação php -->
    <input id="titulo" type="text" name="titulo" placeholder="Informe o título" value="<?= $titulo ?>">
    <br><br>
    
    <input id="autor" type="text" name="autor" placeholder="Informe o autor" value="<?= $autor ?>">
    <br><br>

    <select id="genero" name="genero">
        <option value="" >>--Selecione o gênero--</option>
        <!-- Operador Ternario para validar genero -->
        <option value="D" <?= $genero == 'D'? 'selected': '' ?> >Drama</option>
        <option value="F" <?= $genero == 'F'? 'selected': '' ?> >Ficção</option>
        <option value="R" <?= $genero == 'R'? 'selected': '' ?> >Romance</option>
        <option value="O" <?= $genero == 'O'? 'selected': '' ?> >Outro</option>
    </select>
    <br><br>

    <input id="numPaginas" type="number" name="numPaginas" placeholder="Informe o número de páginas" value="<?= $numPaginas ?>">
    <br><br>

    <input type="submit" value="Enviar" />
</form>

<div id="alertaErro" style="color: red;"> <?= $msgErro ?> </div>

<h3>Livros cadastrados</h3>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Gênero</th>
        <th>Quant. Páginas</th>
        <th>Excluir</th>
    </tr>

    <?php foreach($livros as $l): ?>
        <tr>
            <td><?php echo $l['id'] ?></td>
            <td><?= $l['titulo'] ?></td>
            <td><?= $l['autor'] ?></td>
            <td>
                <?php if($l['genero'] == 'D') 
                        echo 'Drama';
                      elseif($l['genero'] == 'F')
                        echo 'Ficção';
                      elseif($l['genero'] == 'R')
                        echo 'Romance';
                      elseif($l['genero'] == 'O')
                        echo 'Outro';
                ?>
            </td>
            <td><?= $l['paginas'] ?></td>
            <td>
                <a href="excluir.php?id=<?= $l['id'] ?>"
                   onclick="return confirm('Confirma a exclusão?')" >
                    Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
<script src="./validacao.js"></script>
</html>