<?php
require_once "model/registroResiduos.php";
class RegistroResiduosControlador
{

    private $modelo;

    public function __construct()
    {
        $this->modelo = new registroResiduos;
    }

    public function Inicio()
    {
        //echo "Este es el controlador de inicio";
        require_once "view/header.php";
        require_once "view/inicio/principal.php";
        require_once "view/footer.php";
    }

    public function FormInicio()
    {
        require_once "view/header.php";
        require_once "view/registroResiduos/registroResiduos.php";
        require_once "view/footer.php";
    }

    public function Guardar()
    {
        $p = new registroResiduos();

        $p->setFecha($_POST['date']);
        $p->setNombreAprendiz($_POST['nombre']);
        $p->setUsuarios($_POST['usuario']);
        $p->setFicha($_POST['ficha']);
        $p->setObservaciones($_POST['observaciones']);
        $p->setEstado("Pendiente");
        $p->setFirmaAprendiz($_POST['codigo']);

        $this->modelo->Insertar($p);

        header("location:?c=registroResiduos&a=FormInicio");
    }

    public function Listar()
    {

        require_once "view/header2.php";
        require_once "view/registroResiduos/listaregistroResiduos.php";
        require_once "view/footer.php";
    }

    public function Buscar()
    {
        $p =  new registroResiduos();
        $p->setFirmaAprendiz($_POST['campo']);

        $resultado = $this->modelo->Buscar($p);

        if (!isset($resultado)) {
            require_once "view/header2.php";
            require_once "view/registroResiduos/resultado.php";
            require_once "view/footer.php";
            
           
        }else {
            require_once "view/header2.php";
            require_once "view/registroResiduos/resultado.php";
            require_once "view/footer.php";
            
            //echo "resultado encontrado";
            //var_dump($resultado);
            
        }
        
        
    }

    public function Obtener(){
        if (isset($_GET["id"])){
            $p=$this->modelo->Obtener($_GET["id"]);
            
        }
        require_once "view/header2.php";
        require_once "view/entregaResiduos/entregaResiduos.php";
        require_once "view/footer.php";
    }
}
