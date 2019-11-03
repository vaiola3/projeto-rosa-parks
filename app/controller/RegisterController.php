<?php

    class RegisterController{
        public function index(){
            $page = file_get_contents("app/view/register.html");
            echo $page;
        }
    }