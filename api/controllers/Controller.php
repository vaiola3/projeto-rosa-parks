<?php

namespace RosaParksAPI\Controllers;

class Controller {
	private $model;
	
	#	getters / setters
	
	protected function getModel() {
		return $this->model;
	}
	
	protected function setModel($model) {
		$this->model = $model;
	}
}
?>