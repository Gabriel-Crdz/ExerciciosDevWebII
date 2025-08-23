<?php
/* Mostra o erro na execução */
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistencia.php"); // Importa um arquivo

$livros = buscarDados("livros.json");

//print_r($livros); // Usado para testes

if(isset($_POST["titulo"])){
   $titulo = $_POST["titulo"];
   $genero = $_POST["genero"];
   $qtdPaginas = $_POST["qtdPaginas"];
   $autor = $_POST["autor"];

   $livro = array(
    "id" => uniqid(),
    "titulo" => $titulo,
    "genero" => $genero,
    "paginas" => $qtdPaginas,
    "autor" => $autor,
   );

   array_push($livros, $livro);
   salvarDados($livros, "livros.json");

   header("location: livros.php"); // Força o recarregamento da pagina para limpar o Buffer do form
}

?>

<!-- Corpo da pagina -->
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
<form method="POST">
    <input type="text" name="titulo" placeholder="Informe o título" />
    <br><br> 

    <select name="genero">
        <option value="">--Selecione o gênero--</option>
        <option value="D">Drama</option>
        <option value="F">Ficção</option>
        <option value="R">Romance</option>
        <option value="O">Outro</option>
    </select>
    <input type="text" name="autor" placeholder="Informe o autor" /> 
    <br><br>

    <input type="number" name="qtdPaginas" placeholder="Informe o número de páginas">
    <br><br>

    <input type="submit" value="Enviar" />
</form>

<h3>Livros cadastrados</h3>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Gênero</th>
        <th>Autor</th>
        <th>Quant. Páginas</th>
        <th>Excluir</th>
        
    </tr>

    <?php foreach($livros as $livro):?>
        <tr>
            <td><?= $livro["id"]?></td> <!-- Short Tag(< ? =) para php -->
            <td><?= $livro["titulo"]?></td>
            <td><?= $livro["genero"]?></td>
            <td><?= $livro["autor"]?></td>
            <td><?= $livro["paginas"]?></td>
            <td><a href="excluir.php?id=<?= $livro["id"]?>" onclick="return confirm('Confima a exclusão?')">Excluir</a></td>
        </tr>
    <?php endforeach;?>
</table>

</body>
</html>