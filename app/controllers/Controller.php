<?php
    class Controller {
        private $view;
		private $model;
		
		public function __contruct($model, $view) {
			$this->setModel($model);
			$this->setView($view);
		}
        
        #	getters / setters

		protected function getView() {
			return $this->view;
		}

		protected function setView($novaView) {
			$this->view = $novaView;
        }
        
        protected function getModel() {
			return $this->model;
		}

		protected function setModel($model) {
			$this->model = $model;
		}
    }
 ?>