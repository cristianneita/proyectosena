<?php
    require_once "model/fichas.php";

    class FichaControlador{
        private $modelo;

        public function __construct()
        {
            $this->modelo =  new Fichas();

        }

        public function Inicio(){
            require_once "view/header.php";
            require_once "view/inicio/principal.php";
            require_once "view/footer.php";
        }

        public function FormCrear(){
            require_once "view/header2.php";
            require_once "view/fichas/registrarFicha.php";
            require_once "view/footer.php";
        }

        public function FormUpdate(){
            if(isset($_GET['id'])){
                $p=$this->modelo->Obtener($_GET['id']);
            }

            require_once "view/header2.php";
            require_once "view/fichas/actualizarFicha.php";
            require_once "view/footer.php";
        }

        public function Actualizar(){
            $p = new Fichas();
            $p->setIdFichas($_POST['id']);
            $p->setNumeroFicha($_POST['numeroficha']);
            $p->setAmbiente($_POST['ambiente']);
            $p->setInstructor($_POST['instructor']);
            $p->setJornada($_POST['Jornada']);
            $p->setNombreprograma($_POST['nombreprograma']);
            $this->modelo->Actualizar($p);

            header("location:?c=ficha&a=ListarFicha");
        }
        

        public function Guardar(){
            $p = new Fichas();
            $p->setNumeroFicha($_POST['numeroficha']);
            $p->setAmbiente($_POST['ambiente']);
            $p->setInstructor($_POST['instructor']);
            $p->setJornada($_POST['Jornada']);
            $p->setNombreprograma($_POST['nombreprograma']);          
          
            $this->modelo->Insertar($p);
            
           header("location:?c=ficha&a=ListarFicha");

        }

        public function Borrar(){
            $this->modelo->Eliminar($_GET["id"]);
            header("location:?c=ficha&a=ListarFicha");
        }

        public function ListarFicha(){
            require_once "view/header2.php";
            require_once "view/fichas/listaFichas.php";
            require_once "view/footer.php";
        }

        public function Buscar(){
            $p =  new Fichas();
            $p->setNumeroFicha($_POST['buscarFicha']);
            $resultado = $this->modelo->Buscar($p);

            //var_dump($resultado);

            if (!isset($resultado)) {
                require_once "view/header2.php";
                require_once "view/fichas/resultado.php";
                require_once "view/footer.php";
                
               
            }else {
                require_once "view/header2.php";
                require_once "view/fichas/resultado.php";
                require_once "view/footer.php";
                
                //echo "resultado encontrado";
                //var_dump($resultado);
                
            }
        }
    }