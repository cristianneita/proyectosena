<?php
require_once "model/tipoResiduos.php";
class tipoControlador
{
    private $modelo;

    public function __construct()
    {
        $this->modelo =  new tipoResiduos;
    }

    public function FormCrear(){
        /*$titulo="REGISTRAR";
        $p= new tipoResiduos();
        if (isset($_GET['id'])){
            $p=$this->modelo->Obtener($_GET['id']);
            $titulo="EDITAR";
        }*/

        require_once "view/header2.php";
        require_once "view/tipo/tipoResiduos.php";
        require_once "view/footer.php";
    }

    public function FormUpdate(){
        if (isset($_GET["id"])){
            $p=$this->modelo->Obtener($_GET["id"]);
            
        }
        require_once "view/header2.php";
        require_once "view/tipo/actualizarResiduos.php";
        require_once "view/footer.php";
    }

    public function Actualizar(){
        $p = new tipoResiduos();
        $p->setId_tipoResiduo($_POST['id']);
        $p->setCategoria($_POST['categoria']);
        $p->setTipo($_POST['tipo']);  
    
        $this->modelo->Update($p);
        //var_dump($p);
        
        header("location:?c=tipo&a=Listar");
    }

    public function Guardar(){
        $p = new tipoResiduos();
       
        $p->setCategoria($_POST['categoria']);
        $p->setTipo($_POST['tipo']);      

        $this->modelo->Insertar($p);
    
        header("location:?c=tipo&a=Listar");

    }

    public function Listar(){
        require_once "view/header2.php";
        require_once "view/tipo/listaResiduos.php";
        require_once "view/footer.php";
    }

    public function Borrar(){
        $this->modelo->Eliminar($_GET["id"]);
        header("location:?c=tipo&a=Listar");
    }
}
