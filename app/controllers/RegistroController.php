<?php 

	class RegistroController {
		private $view;
		private $model;

		public function start() {
			$this->carregarRegistroModel();
			$this->carregarRegistroView();
			$this->imprimirTela();
		}

		public function carregarRegistroView() {
			$this->setView(new RegistroView);
		}

		public function carregarRegistroModel() {
			$this->setModel(new RegistroModel);
		}

		public function imprimirTela() {
			$view = $this->getView();
			$model = $this->getModel();

			$view->carregarBotaoSair();
			$view->carregarOpcoesTipoUsuario();

			$etnias = $model->consultarEtniasCadastradas();
			$view->carregarSelectEtnias($etnias);

			$generos = $model->consultarGenerosCadastrados();
			$view->carregarSelectGenero($generos);

            $view->imprimirHtml();
		}

		#	getters / setters

		private function getView() {
			return $this->view;
		}

		private function setView($novaView) {
			$this->view = $novaView;
		}

		private function getCorpoTemplateSair() {
			return $this->corpoTemplateSair;
		}

		private function setCorpoTemplateSair($arquivo) {
			$this->corpoTemplateSair = $arquivo;
		}

		private function getCorpoRegisterView() {
			return $this->corpoRegisterView;
		}

		private function setCorpoRegisterView($arquivo) {
			$this->corpoRegisterView = $arquivo;
		}

		private function getModel() {
			return $this->model;
		}

		private function setModel($model) {
			$this->model = $model;
		}
	}

 ?>