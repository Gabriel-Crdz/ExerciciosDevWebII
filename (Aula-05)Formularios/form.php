<!-- E possivel usar HTML dentro do php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios</title>
</head>
<body>
    <h1>Formulario:</h1>
    <!-- "method" por padrao é "GET" -->
    <!-- "action" chama a requisição, por padrão apropria pagina -->
    <form action= "processa.php" method= "POST">
        <input type="text" placeholder="Nome" name="nome">
        <br><br>

        <input type="number" placeholder="Idade" name="idade">
        <br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
