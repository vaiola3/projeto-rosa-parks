<?php

    class RegistroController {
    	public function consultarEmail($email) {
    		$response = [
    			'data' => [
    				'valido' => true
    			]
    		];

    		return $response;
    	}
    }

 ?>