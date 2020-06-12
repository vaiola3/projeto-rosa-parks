<?php

  class AdminController extends Controller {
    public function __construct() {
      $this->setModel(new AdminModel);
      $this->setTwig(Twig::getInstancia());
    }

    public function start() {
      $this->imprimirTela();
    }

    public function imprimirTela() {
      $model = $this->getModel();

      $primeiroNome = explode(' ', $_SESSION['nome'])[0];

      $args = [
        'API_USER'          => Env::get('API_USER'),
        'API_PASS'          => Env::get('API_PASS'),
        'urlHost'           => Env::get('APP_HOST'),
        'NOME_USUARIO'      => $primeiroNome,
        'iconeLogout' 	    => 'out',
        'mensagemLogout'    => 'Sair'
      ];

      $this->imprimirConteudo('adminView.html', $args);
    }
  }

?>