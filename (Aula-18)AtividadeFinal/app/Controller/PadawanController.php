<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Dao\PadawanDao;
use App\Mapper\PadawanMapper;
use App\Service\PadawanService;
use App\Util\MensagemErro;
use \PDOException;

class PadawanController{
    private PadawanDao $padawanDao;
    private PadawanMapper $padawanMapper;
    private PadawanService $padawanService;

    public function __construct(){
        $this->padawanDao = new PadawanDao();
        $this->padawanMapper = new PadawanMapper();
        $this->padawanService = new PadawanService();
    }

	public function listar(Request $request, Response $response, array $args): Response {
		$padawans= $this->padawanDao->list();
		// $response->getBody()->write(print_r($padawans, true));
		$json = json_encode($padawans, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); // Convertendo o array em json
		$response->getBody()->write($json);
		return $response
			->withHeader('Content-Type', 'application/json')
			->withStatus(200);
    }

    public function inserir(Request $request, Response $response, array $args): Response{
        $arrayPadawan = $request->getParsedBody();
        $padawan = $this->padawanMapper->mapFromDatabaseToObject($arrayPadawan);
        $erros = $this->padawanService->validar($padawan);

        if($erros){
            $jsonErros = MensagemErro::getJSONErro($erros, "", 400);
            $response->getBody()->write($jsonErros);
            return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(400);
        }
        try{
            $this->padawanDao->insert($padawan);
            $json = json_encode($padawan, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            $response->getBody()->write($json);
			return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(201); // json criando
		}
		catch(PDOException $e){
			$jsonErro = MensagemErro::getJSONErro("Erro ao inserir o padawan!!", $e->getMessage(), 500);
			$response->getBody()->write($jsonErro);
			return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(500); // Erro no server
		}
    }

    public function buscarPorId(Request $request, Response $response, array $args): Response{
        $id = $args['id'];
        $padawan = $this->padawanDao->findById($id);
        $json = json_encode($padawan, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); // Convertendo o array em json
		$response->getBody()->write($json);
		if($padawan){
			return $response
				->withHeader('Content-Type', 'application/json')
				->withStatus(200);
		}
		return $response->withStatus(404);
    }

    public function editar(Request $request, Response $response, array $args): Response {
        $id = $args['id'];
        $padawan = $this->padawanDao->findById($id);

        if($padawan){
            $arrayPadawan = $request->getParsedBody();
            $padawan = $this->padawanMapper->mapFromDatabaseToObject($arrayPadawan);

            $erros = $this->padawanService->validar($padawan);
            if($erros){
                $jsonErro = MensagemErro::getJSONErro($erros, "", 400);
				$response->getBody()->write($jsonErro);
				return $response
					->withHeader('Content-Type', 'application/json')
					->withStatus(400); // Erro na requisição
            }

            try{
				$padawan->setId($id);
				$this->padawanDao->update($padawan); // Chama o metodo do Dao para atualizar no banco de dados
				$json = json_encode($padawan, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); // Convertendo o array em json

				$response->getBody()->write($json);
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(200); // atualizado
			}
			catch(PDOException $e){
				$jsonErro = MensagemErro::getJSONErro("Erro ao atualizar o padawan!", $e->getMessage(), 500);
				$response->getBody()->write($jsonErro);
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(500); // Erro no server
			}
		}		
		return $response
				->withStatus(404); // Erro de não encontrado
    }

    public function excluir(Request $request, Response $response, array $args): Response{
        $id = $args['id'];
        $padawan = $this->padawanDao->findById($id);

        if($padawan){
            try{
                $padawan = $this->padawanDao->delete($id);
                return $response->withStatus(200);
            }
            catch(PDOException $e){
                $jsonErro = MensagemErro::getJSONErro("Erro ao deletar o padawan!", $e->getMessage(), 500);
				$response->getBody()->write($jsonErro);
				return $response
						->withHeader('Content-Type', 'application/json')
						->withStatus(500); // Erro no server
            }
        }

        return $response->withStatus(404); // Erro de não encontrado
    }
}

?>