
<?php
function exibir($valid){
    if($valid == True){
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="" method="post">
                <input type="text" name="login" placeholder="login">
                <input type="text" name="senha" placeholder="senha">
                <br>
                <button>Enviar<button>
            </form>
        </body>
        </html>';
    }
}

$login = $_POST["login"];
$senha = $_POST["senha"];
$valid = True;

if($login == "ifpr" && $senha == "tads"){
    $valid = False;
    echo "Bem-vindo ao TADS!!";
}
exibir($valid)
?>