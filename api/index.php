<?php

    require_once('../vendor/autoload.php');

	require_once("../app/config/env.php");
	require_once("../app/config/Conexao.php");

	require_once('controllers/Controller.php');
	require_once('controllers/RegistroController.php');
	require_once('controllers/AdminController.php');
	
	require_once('models/Model.php');
	require_once('models/RegistroModel.php');
	require_once('models/AdminModel.php');

    use Psr\Http\Message\ServerRequestInterface as Request;
	use Psr\Http\Message\ResponseInterface as Response;
    use Tuupola\Middleware\HttpBasicAuthentication as Auth;

    #	config Slim / BasicAuth

    $config = ['settings' => [
	    'addContentLengthHeader' => false,
	    'displayErrorDetails' => true,
	]];

    $app = new \Slim\App($config);

    function basicAuth() {
    	$basicAuth = new Tuupola\Middleware\HttpBasicAuthentication([
		    "users" => [
		        env('API_USER') => env('API_PASS')
		    ],
		    "secure" => false
		]);

		return $basicAuth;
    };

	#	routes	GET
	
	$app->group('/registro/consultar', function () use ($app) {
		$controller = new RegistroController;

		$app->get('/email/{email}', function ($request, $response, $args) use ($controller) {

    		$enderecoEmail = $args['email'];

    		$retorno = $controller->verificarEmail($enderecoEmail);

    		$json = $response->withJson($retorno['data'], 201);

    		return $json;
		});
	})->add(basicAuth());

	#	routes	POST

	$app->group('/admin', function () use ($app) {
		$controller = new AdminController;
		
		$app->post('/consultar', function ($request, $response, $args) use ($controller) {

			$solicitacao = $request->getParams();

			$retornoController = $controller->consultar($solicitacao);

			$json = $response->withJson($retornoController);

			return $json;
		});
    })->add(basicAuth());

    $app->group('/registro', function () use ($app) {
		$controller = new RegistroController;
		
		$app->post('/cadastrar', function ($request, $response, $args) use ($controller) {

			$dadosNovoUsuario = $request->getParams();

			$retornoController = $controller->cadastrarNovoUsuario($dadosNovoUsuario);

			$json = $response->withJson($retornoController);

			return $json;
		});
    })->add(basicAuth());

    #	run

    $app->run();

 ?>