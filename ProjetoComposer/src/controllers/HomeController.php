<?php

namespace Php\Primeiroprojeto\Controllers;

class HomeController{

    public function olamundo($params){
        return "Olá Mundo!";
    }

    public function formExer1($params){
        require_once("../src/views/exer1.html");
    }
}