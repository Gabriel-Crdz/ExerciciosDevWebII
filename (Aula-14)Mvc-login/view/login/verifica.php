<?php

include_once(__DIR__ . "/../../controller/UsuarioController.php");
include_once(__DIR__ . "/../../util/config.php");

$usuarioCont = new UsuarioController();
if(! $usuarioCont->usuarioEstaLogado()){ // Valida se o usuario esta logado, se não redireciona para o login.php
    header("location: " . URL_BASE . "/view/login/login.php"); 
    exit;
}
?>