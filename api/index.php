<?php

    require_once('../vendor/autoload.php');

    require_once("../app/config/env.php");

    require_once('controllers/RegistroController.php');

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

    #	routes

    $app->group('/registro', function () use ($app) {

    	$controller = new RegistroController;

    	$app->get('/consultarEmail/{email}', function ($request, $response, $args) use ($controller) {

    		$enderecoEmail = $args['email'];

    		$retorno = $controller->consultarEmail($enderecoEmail);

    		$json = $response->withJson($retorno['data'], 201);

    		return $json;
    	});

    })->add(basicAuth());

    #	run

    $app->run();

 ?>