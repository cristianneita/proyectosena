<?php
require "model/entregaResiduos.php";
class EntregaResiduosControlador
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new entregaResiduos;
    }

    public function entregaResiduos()
    {
        //echo "Este es el controlador de inicio";
        require_once "view/header2.php";
        require_once "view/entregaResiduos/entregaResiduos.php";
        require_once "view/footer.php";
    }

    public function Guardar()
    {
        foreach ($_POST['tipo'] as $key => $value) {
            if ($value != null) {
                $p =  new entregaResiduos();

                $p->setRegistroResiduo($_POST['id']);
                $p->setTipoResiduos($value);
                $p->setPeso($_POST['peso'][$key]);

                $this->modelo->Insertar($p);

                $r =  new registroResiduos();
                $r->setEstado('Realizado');
                $r->setUsuarios($_SESSION['user']['id_usuarios']);
                $r->setId_residuos($_POST['id']);
                $this->modelo->ActualizarEstado($r);
                echo "<SCRIPT >
                alert('Entrega Exitosa');
                document.location=('?c=registroResiduos&a=Listar');
                </SCRIPT>";
            }
        }
    }

    public function Listar()
    {
        require_once "view/header2.php";
        require_once "view/entregaResiduos/listadoEntrega.php";
        require_once "view/footer.php";
    }

    public function Buscar()
    {
        $p =  new registroResiduos();
        $resultado = $this->modelo->BuscarFechas($p);
        //var_dump($resultado);

        if (!isset($resultado)) {
            require_once "view/header2.php";
            require_once "view/entregaResiduos/resultado.php";
            require_once "view/footer.php";
        } else {
            require_once "view/header2.php";
            require_once "view/entregaResiduos/resultado.php";
            require_once "view/footer.php";

            //echo "resultado encontrado";
            //var_dump($resultado);

        }
    }

    public function generarExcel(){
        require_once "view/entregaResiduos/excel.php";
    }
}
