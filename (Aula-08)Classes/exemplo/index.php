<?php
include_once("Calculadora.php");

$calc1 = new Calculadora(); // Criando um objeto da classe calculadora 

$calc->setNum1(4); // Declarando os valores dos atributos
$calc->setNum2(7);

$calc2 = new Calculadora(5, 4); // Passando parametros direto  

echo $calc->somar();
?>