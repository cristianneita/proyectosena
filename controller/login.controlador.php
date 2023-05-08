<?php
require_once "model/login.php";

class LoginControlador{
    public function __construct()
    {
        $this->modelo =  new Login();
    }
    
    public function Inicio(){
        require_once "view/header.php";
        require_once "view/inicio/principal.php";
        require_once "view/footer.php";
    }

    public function FormLogin(){
        require_once "view/header.php";
        require_once "view/login/login.php";
        require_once "view/footer.php";
    }

    public function FormInicio(){
        require_once "view/header2.php";
        require_once "view/login/inicio.php";
        require_once "view/footer.php";
    }
    
    public function setLogin(){
        $p = new Login();
        
        $p->setCorreo($_POST['email']);
        $p->setPassword($_POST['password']);

        session_start();
        $this->modelo->getLogin($p);
            
        
    }

    public function destruir(){
        session_destroy();
        header("location:?c=login&a=FormLogin");
    }

    public function FormRestablecer(){
        require_once "view/header.php";
        require_once "view/usuarios/restablecerContraseña.php";
        require_once "view/footer.php";
    }

    public function BuscarUsuario(){
        $p =  new Usuarios();
        $p->setCorreo($_POST['usuario']);
 
        $resultado = $this->modelo->Buscar($p);        
    }

    public function Restablecer(){
        require_once "view/header.php";
        require_once "view/usuarios/restablecer.php";
        require_once "view/footer.php";
    }

    public function nuevaPass(){
        $p = new Usuarios();
        $encriptarpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $p->setCorreo($_POST['correo']);
        $p->setPassword($encriptarpassword);
        $p->setNumeroIdentificacion($_POST['identificacion']);

        $this->modelo->ActualizarPassword($p);

    }

}