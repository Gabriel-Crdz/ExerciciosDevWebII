<?php
include_once(__DIR__ . "/../../controller/MestreController.php");
include_once(__DIR__ . "/../../controller/PlanetaController.php");

$mestreCont = new MestreController(); // Declaração do objeto controller 
$planetaCont = new PlanetaController();

$mestres = $mestreCont->listar(); // Chama o metodo listar
$planetas = $planetaCont->listar();

// print_r($mestres);
// print_r($planetas);

include_once(__DIR__ . "/../include/header.php");
?>

<h2><?= $padawan && $padawan->getID() > 0 ? "Editando Dados" : "Inserido Dados"?> do padawan</h2>
<div style="color: red;">
    <?= $msgErros ?>
</div>
<form action="" method="POST">
    <div>
        <label for="txtNome">Nome:</label>
        <input type="text" name="nome"
            placeholder="Informe o nome" value="<?= $padawan ? $padawan->getNome() : ""  // Operador Ternario ?>"> 
    </div>

    <div>
        <label for="txtEspecie">Especie:</label>
        <input type="text" name="especie"
            placeholder="Informe a especie" value="<?= $padawan ? $padawan->getEspecie() : ""  // Operador Ternario ?>"> 
    </div>

    <div>
        <label for="txtIdade">Idade:</label>
        <input type="number" name="idade"
            placeholder="Informe a idade" value="<?= $padawan ? $padawan->getIdade() : ""  // Operador Ternario ?>">
    </div>

    <div>
    <label for="SelStatus">Status:</label>
    <select name="status">
        <option value="">- Selecione -</option>
        <option value="T" <?= $padawan && $padawan->getStatus() == 'T' ? 'selected': '' ?>>Em treinamento</option>
        <option value="A" <?= $padawan && $padawan->getStatus() == 'A' ? 'selected': '' ?>>Aprovado</option>
        <option value="M" <?= $padawan && $padawan->getStatus() == 'M' ? 'selected': '' ?>>Morto</option>
        <option value="E" <?= $padawan && $padawan->getStatus() == 'E' ? 'selected': '' ?>>Exilado</option>
    </select>
    </div>

    <div>
        <label for="selMestre">Mestre:</label>
        <select name="mestre">
            <option value="">- Selecione -</option>

            <?php foreach($mestres as $m): ?>
                <option value="<?= $m->getId(); ?>?" <?php if($padawan && $padawan->getMestre() && $padawan->getMestre()->getId() == $m->getId()){
                    echo "selected";
                    }
                    ?>
                    ><?= $m->getNomeTitulo() ?>
                </option>
           <?php endforeach; ?>
        </select>
    </div>


    <div>
        <label for="selPlaneta">Planeta:</label>
        <select name="planeta">
            <option value="">- Selecione -</option>

            <?php foreach($planetas as $p): ?>
                <option value="<?= $p->getId(); ?>?" <?php if($padawan && $padawan->getPlaneta() && $padawan->getPlaneta()->getId() == $p->getId()){
                    echo "selected";
                    }
                    ?>
                    ><?= $p->getPlanetaDesc() ?>
                </option>
           <?php endforeach; ?>
        </select>
    </div>

    <input name="id" type="hidden" value="<?= $padawan ? $padawan->getId() : 0 ?>">

    <div class="mt-2">
        <button type="submit" class="btn btn-success">Gravar</button>
    </div>
</form>

<div>
    <a href="listar.php">Voltar</a>
</div>
<?php
include_once(__DIR__ . "/../include/footer.php");
?>