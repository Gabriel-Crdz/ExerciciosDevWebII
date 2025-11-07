<?php 
include_once(__DIR__ . "/../../controller/AlunoController.php");
$alunoCont = new AlunoController(); // Declara o objeto 
$alunos = $alunoCont->listar(); // Chama o metodo listar
// print_r($alunos);

include_once(__DIR__ . "/../include/header.php");
?>
<h3>Listagem de Alunos</h3> 

<div>
    <a href="inserir.php">Inserir</a>
</div>

<table border=1>
    <!-- Cabeçalho -->
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Estrangeiro</th>
        <th>Curso</th>
        <th>Alterar</th>
        <th>Excluir</th>
    </tr>

    <!-- Dados -->
    <?php foreach($alunos as $a): ?>
        <tr>
            <td><?= $a->getId() ?></td>
            <td><?= $a->getNome() ?></td>
            <td><?= $a->getIdade() ?></td>
            <td><?= $a->isEstrangeiro() ?></td>
            <td><?= $a->getCurso()->getCursoTurno()?></td>
            <td> 
                <a onclick="return confirm('Confirma a edição?')" href="editar.php?id=<?= $a->getId()?>"> 
                <img src="../../img/btn_editar.png"></a> 
            </td>
            <td> 
                <a onclick="return confirm('Confirma a exclusão?')" href="excluir.php?id=<?= $a->getId()?>"> 
                <img src="../../img/btn_excluir.png"></a> 
            </td>
        <tr>
    <?php endforeach; ?>

</table>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>