<?php

    class HomeController{
        public function index(){
            $page = file_get_contents("app/view/login.html");
            echo $page;
        }
    }