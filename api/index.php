<?php

require_once('../vendor/autoload.php');

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Tuupola\Middleware\HttpBasicAuthentication as Auth;

use RosaParks\Config\Env;
use RosaParks\Config\Conexao;

use RosaParksAPI\Controllers\RegistroController;
use RosaParksAPI\Controllers\UsuarioController;

#	config Slim / BasicAuth

$config = [
    'settings' => [
        'addContentLengthHeader' => false,
        'displayErrorDetails' => true,
    ]
];
    
$app = new \Slim\App($config);
    
function applyBasicAuth() {
    $basicAuth = new Tuupola\Middleware\HttpBasicAuthentication([
        "users" => [
            Env::get('API_USER') => Env::get('API_PASS')
        ],
        "secure" => false
        ]);
        
        return $basicAuth;
};
        
#	routes	GET

$app->group('/registro/consultar', function () use ($app) {
    $controller = new RegistroController;
    
    $app->get('/email/{address}', function ($request, $response, $args) use ($controller) {
        
        $enderecoEmail = $args['address'];
        
        $retorno = $controller->verificarEmail($enderecoEmail);
        
        $json = $response->withJson($retorno['data'], 201);
        
        return $json;
    });
})->add(applyBasicAuth());
        
$app->group('/usuario/consultar', function () use ($app) {
    $controller = new UsuarioController;
    
    $app->get('/{tipo}/{status}', function ($request, $response, $args) use ($controller) {
        
        $tiposDisponiveis = [
            'alunos' => true, 
            'professores' => true
        ];
        
        $statusDisponiveis = [
            'ativos' => true, 
            'inativos' => true, 
            'aguardando' => true
        ];
        
        $retorno = [];

        $tipo_requisitado = $args["tipo"];
        $status_requisitado = $args["status"];
        
        if(isset($tiposDisponiveis[$tipo_requisitado])){
            if(isset($statusDisponiveis[$status_requisitado])){
                $retorno = $controller->consultar($tipo_requisitado, $status_requisitado);
            }
        }

        $json = $response->withJson($retorno);
                
        return $json;
    });
})->add(applyBasicAuth());
        
#	routes	POST

$app->group('/usuario', function () use ($app) {
    $controller = new UsuarioController;
    
    $app->post('/{acao}/{id}', function ($request, $response, $args) use ($controller) {
        
        $acoesDisponiveis = [
            'ativar' => true, 
            'inativar' => true
        ];
        
        $retorno = [];
        
        if(isset($acoesDisponiveis[$args['acao']])){
            $retorno = $controller->atualizarStatus($args['acao'], $args['id']);
        }
        
        $json = $response->withJson($retorno);
        
        return $json;
        
    });
})->add(applyBasicAuth());
        
$app->group('/registro', function () use ($app) {
    $controller = new RegistroController;
    
    $app->post('/cadastrar', function ($request, $response, $args) use ($controller) {
        
        $dadosNovoUsuario = $request->getParams();
        
        $retornoController = $controller->cadastrarNovoUsuario($dadosNovoUsuario);
        
        $json = $response->withJson($retornoController);
        
        return $json;
    });
})->add(applyBasicAuth());
        
#	run

$app->run();
        
?>