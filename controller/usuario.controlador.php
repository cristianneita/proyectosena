<?php
require_once "model/usuarios.php";

class UsuarioControlador
{
    private $modelo;

    public function __construct()
    {
        $this->modelo =  new Usuarios();
    }

    public function Inicio()
    {
        require_once "view/header.php";
        require_once "view/inicio/principal.php";
        require_once "view/footer.php";
    }

    public function FormCrear()
    {
        require_once "view/header.php";
        require_once "view/usuarios/registrarUsuario.php";
        require_once "view/footer.php";
    }

    public function FormCrear2()
    {
        require_once "view/header2.php";
        require_once "view/usuarios/registrarUsuario.php";
        require_once "view/footer.php";
    }

    public function Guardar()
    {
        $p = new Usuarios();
        $encriptarpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $p->setNombres($_POST['nombres']);
        $p->setApellidos($_POST['apellidos']);
        $p->setTipoIdentificacion($_POST['tipo']);
        $p->setNumeroIdentificacion($_POST['identificacion']);
        $p->setRol($_POST['rol']);
        $p->setEstado("Activo");
        $p->setCorreo($_POST['correo']);
        $p->setPassword($encriptarpassword);


        $this->modelo->Insertar($p);

        //header("location:?c=usuario&a=FormCrear2");
    }

    public function Ver()
    {
        require_once "view/header2.php";
        require_once "view/usuarios/verUsuario.php";
        require_once "view/footer.php";
    }

    public function FormUpdate(){
        if(isset($_GET["id"])){
            $p=$this->modelo->Obtener($_GET["id"]);
        }

        require_once "view/header2.php";
        require_once "view/usuarios/actualizarUsuario.php";
        require_once "view/footer.php";
    }

    public function Actualizar(){
        $p = new Usuarios();
        /*$encriptarpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);*/
        $p->setIdUsuarios($_POST['id']);
        $p->setNombres($_POST['nombres']);
        $p->setApellidos($_POST['apellidos']);  
        $p->setTipoIdentificacion($_POST['tipo']);
        $p->setNumeroIdentificacion($_POST['identificacion']);
        $p->setRol($_POST['rol']);
        $p->setEstado($_POST['estado']);
        $p->setCorreo($_POST['correo']);


        $this->modelo->Update($p);
        //var_dump($p);
        
        header("location:?c=usuario&a=Ver");
    }



}
