<?php 

namespace RosaParks\Config;

class Twig {
	private static $twig = null;
	
	private function __construct(){}
	private function __clone(){}
	private function __wakeup(){}
	
	public static function getInstancia() {
		if(!isset(self::$twig)){
			$loader = new \Twig\Loader\FilesystemLoader([
				'app/template',
				'app/views/'
				]);
				
				self::$twig = new \Twig\Environment($loader, [
					'cache' => false,
					]);
				}	
				return self::$twig;
			}
		}
		
		?>