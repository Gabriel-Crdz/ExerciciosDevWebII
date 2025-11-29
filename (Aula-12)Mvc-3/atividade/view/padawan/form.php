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

<h2><?= $padawan && $padawan->getID() > 0 ? "Editando Dados" : "Inserido Dados" ?> do padawan</h2>
<div>
    <?php if ($msgErros): ?>
        <div class="alert alert-danger">
            <?= $msgErros ?>
        </div>
    <?php endif; ?>
</div>

<form method="POST">

    <div class="row mb-2">
        <label class="col-4" for="txtNome">Nome:</label>
        <input class="col-6" type="text" name="nome"
            placeholder="Informe o nome" value="<?= $padawan ? $padawan->getNome() : ""  // Operador Ternario ?>">
    </div>

    <div class="row mb-2">
        <label class="col-4" for="txtEspecie">Especie:</label>
        <input class="col-6" type="text" name="especie"
            placeholder="Informe a especie" value="<?= $padawan ? $padawan->getEspecie() : ""  // Operador Ternario ?>">
    </div>


    <div class=" row mb-2">
        <label class="col-4" for="txtIdade">Idade:</label>
        <input class="col-6" type="number" name="idade"
            placeholder="Informe a idade" value="<?= $padawan ? $padawan->getIdade() : ""  // Operador Ternario ?>">
    </div>
    
    <div class=" row mb-2">
        <label class="col-4" for="txtSabre">Cor Sabre:</label>
        <input class="col-6" type="txt" name="sabre"
            placeholder="Informe a cor do sabre" value="<?= $padawan ? $padawan->getSabre() : ""  // Operador Ternario ?>">
    </div>

    <div class="row mb-2">
        <label class="col-4" for="Selestado">estado:</label>
        <select class="col-6" name="estado">
            <option value="">- Selecione -</option>
            <option value="T" <?= $padawan && $padawan->getEstado() == 'T' ? 'selected' : '' ?>>Em treinamento</option>
            <option value="A" <?= $padawan && $padawan->getEstado() == 'A' ? 'selected' : '' ?>>Aprovado</option>
            <option value="M" <?= $padawan && $padawan->getEstado() == 'M' ? 'selected' : '' ?>>Morto</option>
            <option value="E" <?= $padawan && $padawan->getEstado() == 'E' ? 'selected' : '' ?>>Exilado</option>
        </select>
    </div>

    <div class=" row mb-2">
        <label class="col-4" for="selMestre">Mestre:</label>
        <select class="col-6" name="mestre">
            <option value="">- Selecione -</option>

            <?php foreach ($mestres as $m): ?>
                <option value="<?= $m->getId(); ?>" <?php if ($padawan && $padawan->getMestre() && $padawan->getMestre()->getId() == $m->getId()) {
                    echo "selected";
                    }
                    ?>><?= $m->getNomeTitulo() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="row mb-2">
        <label class="col-4" for="selPlaneta">Planeta:</label>
        <select class="col-6" name="planeta">
            <option value="">- Selecione -</option>

            <?php foreach ($planetas as $p): ?>
                <option value="<?= $p->getId(); ?>" <?php if ($padawan && $padawan->getPlaneta() && $padawan->getPlaneta()->getId() == $p->getId()) {
                    echo "selected";
                    }
                    ?>><?= $p->getPlanetaDesc() ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <input name="id" type="hidden" value="<?= $padawan ? $padawan->getId() : 0 ?>">
    
                    
    <div class="mt-3 d-flex justify-content-center gap-5">
        <button type="submit" class="btn btn-success">Gravar</button>
        <a href="listar.php" class="btn btn-danger">Voltar</a>
    </div>     
</form>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>