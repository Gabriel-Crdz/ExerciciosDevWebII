<?php

use App\Controller\PadawanController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use Slim\Exception\HttpNotFoundException;

require_once(__DIR__ . '/vendor/autoload.php');

$app = AppFactory::create();
$app->setBasePath("/padawan_api");

// Parse json, form data and xml
$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true); //Retorna um erro do Framework caso não tratado

//ROTAS
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Funcionou!");
    return $response;
});

/* Rotas para Padawans */
$app->get("/padawans", PadawanController::class . ":listar");
$app->post("/padawans", PadawanController::class . ":inserir"); // Usa as mesmas rotas, porque usa metodos diferentes
$app->get("/padawans/{id}", PadawanController::class . ":buscarPorId");
$app->put("/padawans/{id}", PadawanController::class . ":editar");
$app->delete("/padawans/{id}", PadawanController::class . ":excluir");

//Tratamento para rota não encontrada
$app->map(['GET', 'POST','PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});

$app->run();

?>