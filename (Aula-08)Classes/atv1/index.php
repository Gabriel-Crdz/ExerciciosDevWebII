<?php
include_once("Pessoa.php");

$p1 = new Pessoa();
$p1->setNome("Vinicius");
$p1->setSobrenome("Rambo");
echo "Pessoa 1: " . $p1->getNome() . " " . $p1->getSobrenome() . "<br>";

$p2 = new Pessoa("Jucelino", "Kubitschek");
echo "Pessoa 2: " . $p2->getNome() . " " . $p2->getSobrenome() . "<br>";

$p3 = new Pessoa("Rasmus");
$p3->setSobrenome("Lerdorf");
echo "Pessoa 3: " . $p3->getNome() . " " . $p3->getSobrenome() . "<br>";

?>