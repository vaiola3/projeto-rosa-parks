<?php

    class Core{

        public function start( $urlGet ){
            if ( isset( $_GET['pagina'] ) ){
                $controller = ucfirst( $urlGet['pagina'].'Controller' );
            } else {
                $controller = 'HomeController';
            }
    
            $acao = 'index';
    
            if ( !class_exists( $controller ) ){
                $controller = 'ErrorController';
            }
    
            call_user_func_array( array( new $controller, $acao ), array() );
        }

    }