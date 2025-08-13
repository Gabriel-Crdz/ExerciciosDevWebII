<?php
$semana = array("Segunda", "Terça", "Quarta", "Quinta", "Sexta");
$array_vazio = array();

for($i = 0; $i <= 5; $i++){
    $array_vazio[$i]  = $semana[$i];
}

echo "Array vazio";
for($i = 0; $i <= 5; $i++){
    echo $array_vazio[$i] . "<br>";
}
?>