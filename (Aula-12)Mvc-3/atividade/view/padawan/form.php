<?php
include_once(__DIR__ . "/../../controller/CursoController.php");

$cursoCont = new CursoController(); // Declaração do objeto controller 
$cursos = $cursoCont->listar(); // Chama o metodo listar
// print_r($cursos);

include_once(__DIR__ . "/../include/header.php");
?>

