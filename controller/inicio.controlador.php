<?php

class InicioControlador{
    private $modelo;

    public function __construct()
    {
        //$this->modelo=new usuarios;
    }

    public function Inicio(){
        //echo "Este es el controlador de inicio";
        require_once "view/header.php";
        require_once "view/inicio/principal.php";
        require_once "view/footer.php";

    }
}