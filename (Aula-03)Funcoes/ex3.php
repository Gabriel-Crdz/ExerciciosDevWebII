<?php

function desenhaLinha($nome, $habitantes, $area, $altitude, $estado){
    echo "
    <tr>
        <td style = 'border: solid 1px black; padding: 4px'>$nome</td>
        <td style = 'border: solid 1px black; padding: 4px'>$habitantes</td>
        <td style = 'border: solid 1px black; padding: 4px'>$area</td>
        <td style = 'border: solid 1px black; padding: 4px'>$altitude</td>
        <td style = 'border: solid 1px black; padding: 4px'>$estado</td>
    </tr><br>
    ";
}

$nome = array("Foz do Iguaçu", "Cascavel", "Chapeco", "Blumenau", "Curitiba");
$habitantes = array(250000, 300000, 240000, 330000, 1500000);
$area = array("500km²", "420km²", "120km²", "200km²", "300km²");
$altitude = array("145m", "320m", "620m", "85m", "850m");
$estado = array("PR", "PR", "SC", "SC", "PR");

echo "<table style = 'border-collapse: collapse'>";
echo"
    <tr>
        <td style = 'border: solid 1px black; padding: 4px; font-weight: bold'>Nome</td>
        <td style = 'border: solid 1px black; padding: 4px; font-weight: bold'>Habitantes</td>
        <td style = 'border: solid 1px black; padding: 4px; font-weight: bold'>Area</td>
        <td style = 'border: solid 1px black; padding: 4px; font-weight: bold'>Altitude</td>
        <td style = 'border: solid 1px black; padding: 4px; font-weight: bold'>Estado</td>
    </tr><br>";


for($i = 0; $i < 5; $i++){
    desenhaLinha($nome[$i], $habitantes[$i], $area[$i], $altitude[$i], $estado[$i]);
}
echo "</table>";
?>