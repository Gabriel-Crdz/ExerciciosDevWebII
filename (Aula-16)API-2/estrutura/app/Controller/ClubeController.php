<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\ClubeDAO;
use App\Mapper\ClubeMapper;
use App\Service\ClubeService;
use App\Util\MensagemErro;

use \PDOException;

class ClubeController {

	private ClubeDAO $clubeDAO;
	private ClubeMapper $clubeMapper;
	private ClubeService $clubeService;

	public function __construct() {
		$this->clubeDAO = new ClubeDAO();
		$this->clubeMapper = new ClubeMapper();
		$this->clubeService = new ClubeService();
	}

	public function listar(Request $request, Response $response, array $args): Response {
		$clubes = $this->clubeDAO->List();
		// $response->getBody()->write(print_r($clubes, true));
		$json = json_encode($clubes, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); // Convertendo o array em json
		$response->getBody()->write($json);
		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
    }

	public function inserir(Request $request, Response $response, array $args): Response {
		$clubeArray = $request->getParsedBody(); // Pega o array da requisição
		$clube = $this->clubeMapper->mapFromDatabaseToObject($clubeArray); // transforma o array em um objeto

		$erro = $this->clubeService->validar($clube);

		if($erro){
			$jsonErro = MensagemErro::getJSONErro($erro, "", 400);
			$response->getBody()->write($jsonErro);
			return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(400); // Erro na requisição
		}
		
		try{
			$this->clubeDAO->insert($clube); // Chama o metodo do Dao para inserir no banco de dados
			$json = json_encode($clube, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); // Convertendo o array em json

			$response->getBody()->write($json);
			return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(201); // json criando
		}
		catch(PDOException $e){
			$jsonErro = MensagemErro::getJSONErro("Erro ao inserir o clube!!", $e->getMessage(), 500);
			$response->getBody()->write($jsonErro);
			return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(500); // Erro no server
		}
	}

	public function buscarPorId(Request $request, Response $response, array $args): Response {
		$id = $args['id']; // Pega o id vindo dos argumentos
		$clube = $this->clubeDAO->findById($id); // Chama o metodo Dao para encontrar o id
		$json = json_encode($clube, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); // Convertendo o array em json
		$response->getBody()->write($json);
		if($clube){
			return $response
				->withHeader('Content-Type', 'application/json')
				->withStatus(200);
		}
		return $response->withStatus(404);
	}

	public function editar(Request $request, Response $response, array $args): Response{
		$id = $args['id'];
		$clube = $this->clubeDAO->findById($id); // Localiza o id

		if($clube){
			$clubeArray = $request->getParsedBody(); // Pega o array da requisição
			$clube = $this->clubeMapper->mapFromDatabaseToObject($clubeArray); // transforma o array em um objeto

			$erro = $this->clubeService->validar($clube);
			if($erro){
				$jsonErro = MensagemErro::getJSONErro($erro, "", 400);
				$response->getBody()->write($jsonErro);
				return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(400); // Erro na requisição
			}

			try{
				$clube->setId($id);
				$this->clubeDAO->update($clube); // Chama o metodo do Dao para atualizar no banco de dados
				$json = json_encode($clube, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); // Convertendo o array em json

				$response->getBody()->write($json);
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(200); // atualizado
			}
			catch(PDOException $e){
				$jsonErro = MensagemErro::getJSONErro("Erro ao deletar o clube!", $e->getMessage(), 500);
				$response->getBody()->write($jsonErro);
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(500); // Erro no server
			}
		}		
		return $response
				->withStatus(404); // Erro de não encontrado
	}

	public function excluir(Request $request, Response $response, array $args): Response {
		$id = $args['id'];
		$clube = $this->clubeDAO->findById($id); // Localiza o id
		if($clube){
			try{
				$clube = $this->clubeDAO->deleteById($id); // Tenta excluir pelo id
				return $response
					->withStatus(200); // Exclusão feita com sucesso
			}
			catch(PDOException $e){
				$jsonErro = MensagemErro::getJSONErro("Erro ao deletar o clube!", $e->getMessage(), 500);
				$response->getBody()->write($jsonErro);
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(500); // Erro no server
			}
		}		
		return $response
				->withStatus(404); // Erro de não encontrado
	}

}