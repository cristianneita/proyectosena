<?php
require "model/fichas.php";
class registroResiduos {

    private $pdo;

    private $id_residuos;
    private $fecha;
    private $nombreAprendiz;
    private $usuarios;
    private $ficha;
    private $observaciones;
    private $estado;
    private $firmaAprendiz;

    public function __construct()
    {
        $this->pdo = conexion::Conectar();
    }
 
    public function getId_residuos()
    {
        return $this->id_residuos;
    }

    public function setId_residuos($id_residuos)
    {
        $this->id_residuos = $id_residuos;

        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getNombreAprendiz()
    {
        return $this->nombreAprendiz;
    }

    public function setNombreAprendiz($nombreAprendiz)
    {
        $this->nombreAprendiz = $nombreAprendiz;

        return $this;
    }

    public function getUsuarios()
    {
        return $this->usuarios;
    }

    public function setUsuarios($usuarios)
    {
        $this->usuarios = $usuarios;

        return $this;
    }

    public function getFicha()
    {
        return $this->ficha;
    }

    public function setFicha($ficha)
    {
        $this->ficha = $ficha;

        return $this;
    }

    public function getObservaciones()
    {
        return $this->observaciones;
    }

    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

   
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getFirmaAprendiz()
    {
        return $this->firmaAprendiz;
    }

    public function setFirmaAprendiz($firmaAprendiz)
    {
        $this->firmaAprendiz = $firmaAprendiz;

        return $this;
    }

    public function Insertar(registroResiduos $p){
        try {
            $consulta="INSERT INTO registroresiduos(fecha, nombreAprendiz, usuarios ,ficha, observaciones, estado, firmaAprendiz) VALUES (?,?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
            ->execute(array(
                $p->getFecha(),
                $p->getNombreAprendiz(),
                $p->getUsuarios(),
                $p->getFicha(),
                $p->getObservaciones(),
                $p->getEstado(),
                $p->getFirmaAprendiz()
            ));
            
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarRegistroResiduos(){
        try {
            $consulta = $this->pdo->prepare("SELECT registroresiduos.id_residuos, registroresiduos.fecha, registroresiduos.nombreAprendiz, usuarios.nombres, fichas.numeroFicha, registroresiduos.observaciones, registroresiduos.estado, registroresiduos.firmaAprendiz
             FROM registroresiduos, fichas, usuarios WHERE registroresiduos.ficha=fichas.id_ficha AND registroresiduos.usuarios=usuarios.id_usuarios ORDER BY id_residuos desc;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function Buscar(registroResiduos $p){
        try {
            $consulta = $this->pdo->prepare("SELECT registroresiduos.id_residuos, registroresiduos.fecha, registroresiduos.nombreAprendiz, usuarios.nombres,fichas.numeroFicha, registroresiduos.observaciones, registroresiduos.estado, registroresiduos.firmaAprendiz 
            FROM registroresiduos, fichas, usuarios WHERE firmaAprendiz LIKE ? AND registroresiduos.ficha=fichas.id_ficha AND registroresiduos.usuarios=usuarios.id_usuarios");
            $consulta
                ->execute(array(
                    $p->getFirmaAprendiz()
                ));
                
            return $consulta->fetchAll(PDO::FETCH_OBJ);
            //echo $consulta;
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try {
            $consulta = $this->pdo->prepare("SELECT registroresiduos.id_residuos, registroresiduos.fecha, registroresiduos.nombreAprendiz, registroresiduos.usuarios,fichas.numeroFicha, registroresiduos.observaciones, registroresiduos.estado, registroresiduos.firmaAprendiz
            FROM registroresiduos, fichas WHERE registroresiduos.ficha=fichas.id_ficha AND id_residuos=?;");
            $consulta->execute(array($id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $p = new registroResiduos();
            $p->setId_residuos($r->id_residuos);
            $p->setNombreAprendiz($r->nombreAprendiz);
            $p->setFicha($r->numeroFicha);
            

            return $p;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}