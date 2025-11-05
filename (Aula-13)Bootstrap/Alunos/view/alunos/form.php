<?php
include_once(__DIR__ . "/../../controller/CursoController.php");

$cursoCont = new CursoController(); // Declaração do objeto controller 
$cursos = $cursoCont->listar(); // Chama o metodo listar
// print_r($cursos);

include_once(__DIR__ . "/../include/header.php");
include_once(__DIR__ . "/../include/menu.php");

?>
<!--HTML-->
<h3><?= $aluno && $aluno->getId() > 0 ? "Editando" : "Inserindo" ?> aluno</h3>
<div class="row">
    <div class="col-6">
        <form method="POST" action="">

            <div class="mb-3">
                <label class="form-label" for="txtNome">Nome:</label>
                <input class="form-control" type="text" id="txtNome" name="nome"
                    placeholder="Informe o nome" value="<?= $aluno ? $aluno->getNome() : ""  // Operador Ternario ?>"> 
            </div>

            <div class="mb-3">
                <label class="form-label" for="txtIdade">Idade:</label>
                <input class="form-control" type="number" id="txtIdade" name="idade"
                    placeholder="Informe a idade" value="<?= $aluno ? $aluno->getIdade() : ""  // Operador Ternario ?>">
            </div>

            <div class="mb-3">
                <label class="form-label" for="selEstrang">Estrangeiro:</label>
                <select class="form-select" name="estrang" id="selEstrang">
                    <option value="">----Selecione----</option>
                    <option value="S"  <?= $aluno && $aluno->getEstrangeiro() == 'S' ? 'selected': '' ?>>Sim</option>
                    <option value="N"  <?= $aluno && $aluno->getEstrangeiro() == 'N' ? 'selected': '' ?>>Não</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="selCurso">Curso:</label>
                <select class="form-select" name="curso" id="selCurso">
                    <option value="">----Selecione----</option>

                    <?php foreach($cursos as $c): ?>
                        <option 
                            value="<?= $c->getId(); ?>" 
                            <?php if($aluno && $aluno->getCurso() && $aluno->getCurso()->getId() == $c->getId()){
                                echo "selected";
                            }
                            ?>
                        ><?= $c->getCursoTurno() ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input name="id" type="hidden" value="<?= $aluno ? $aluno->getId() : 0 ?>">

            <div class="mt-2">
                <button type="submit" class="btn btn-success">Gravar</button>
            </div>

        </form>
    </div>
    <div class="col-6">
        <?php if($msgErros) :?>
            <div class="alert alert-danger">
            <?= $msgErros ?>
            </div>
        <?php endif;?>
    </div>
</div> <!--Fechamento da div row-->

<div>
    <a href="listar.php" class="mt-3 btn btn-outline-danger">Voltar</a>
</div>

<?php
include_once(__DIR__ . "/../include/footer.php");
?>
