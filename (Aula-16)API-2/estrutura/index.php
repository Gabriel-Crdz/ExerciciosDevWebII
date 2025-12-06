<?php

use App\Controller\ClubeController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use Slim\Exception\HttpNotFoundException;

require_once(__DIR__ . '/vendor/autoload.php');

$app = AppFactory::create();
$app->setBasePath("/futebol_api"); //Adicionar o nome da pasta do projeto

// Parse json, form data and xml
$app->addBodyParsingMiddleware();
//$app->addRoutingMiddleware(); //Serve para adicionar tratamentos padrões para erros retornados pelos ENDPoints
$app->addErrorMiddleware(true, true, true); //Retorna um erro do Framework caso não tratado

//ROTAS
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Funcionou!");
    return $response;
});

// $app->get('/olaMundo', function (Request $request, Response $response, $args){
//     $parametros = $request->getQueryParams(); // Pegando parametros da requisição

//     $nome = "";
//     if(isset($paramentos['nome'])) $nome = $parametros['nome'];
//     $response->getBody()->write("OLA," . $nome . "!!!!"); /* Chamada: /olaMundo?nome=Fulano */
//     return $response;
// });

// $app->get('/olaMundo2/{nome}', function (Request $request, Response $response, $args){
//     $nome = $args["nome"]; // Pegando o nome com argumento

//     $response->getBody()->write("OLA, " . $nome . " !!!!"); /* Chamada: /olaMundo/Fulano */
//     return $response;
// });

/* Rotas para Clubes */
$app->get("/clubes", ClubeController::class . ":listar");
$app->post("/clubes", ClubeController::class . ":inserir"); // Usando a mesma rota porque utiliza outro metodo(POST)
$app->get("/clubes/{id}", ClubeController::class . ":buscarPorId");
$app->put("/clubes/{id}", ClubeController::class . ":editar");
$app->delete("/clubes/{id}", ClubeController::class . ":excluir");

//Tratamento para rota não encontrada
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
    throw new HttpNotFoundException($request);
});

$app->run();
