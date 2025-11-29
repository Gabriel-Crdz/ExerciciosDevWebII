<?php 
include_once(__DIR__ . "/../../controller/PadawanController.php");
$padawanCont = new PadawanController(); // Declara o objeto 
$padawan = $padawanCont->listar(); // Chama o metodo listar
// print_r($padawan);

include_once(__DIR__ . "/../include/header.php");
?>
<h3>Listagem de Padawans</h3> 

<div>
    <a href="inserir.php" class="mt-2 mb-3 btn btn-success">Inserir</a>
</div>

<table>
    <!-- Cabeçalho -->
    <tr class= "table-danger">
        <th>ID</th>
        <th>Nome</th>
        <th>Especie</th>
        <th>Idade</th>
        <th>Cor sabre</th>
        <th>Status</th>
        <th>Mestre</th>
        <th>Planeta</th>
        <th>Alterar</th>
        <th>Excluir</th>
    </tr>

    <!-- Dados -->
    <?php foreach($padawan as $p): ?>
        <tr>
            <td><?= $p->getId() ?></td>
            <td><?= $p->getNome() ?></td>
            <td><?= $p->getEspecie() ?></td>
            <td><?= $p->getIdade() ?></td>
            <td><?= $p->getSabre() ?></td>
            <td><?= $p->getEstadoDesc() ?></td>
            <td><?= $p->getMestre()->getNomeTitulo() ?></td>
            <td><?= $p->getPlaneta()->getPlanetaDesc(); $p->getPlaneta()->getQuad()?></td>
            <td> 
                <a onclick="return confirm('Confirma a edição?')" href="editar.php?id=<?= $p->getId()?>"> 
                <img src="../../public/img/alterar.png"></a> 
            </td>
            <td> 
                <a onclick="return confirm('Confirma a exclusão?')" href="excluir.php?id=<?= $p->getId()?>"> 
                <img src="../../public/img/excluir.png"></a> 
            </td>
        <tr>
    <?php endforeach; ?>

</table>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>