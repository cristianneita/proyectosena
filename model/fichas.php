<?php

class Fichas{ 
    private $pdo;
    
    private $id_fichas;
    private $numeroficha;
    private $ambiente;
    private $instructor;
    private $jornada;
    private $nombreprograma;

    public function __construct()
    {
        $this->pdo = conexion::Conectar();
    }

    public function getIdFichas()
    {
        return $this->id_fichas;
    }

    public function setIdFichas($id_fichas)
    {
        $this->id_fichas = $id_fichas;
    }

    public function getNumeroFicha()
    {
        return $this->numeroficha;
    }

    public function setNumeroFicha($numeroficha)
    {
        $this->numeroficha = $numeroficha;
    }

    public function getAmbiente()
    {
        return $this->ambiente;
    }

    public function setAmbiente($ambiente)
    {
        $this->ambiente = $ambiente;
    }

    public function getInstructor()
    {
        return $this->instructor;
    }

    public function setInstructor($instructor)
    {
        $this->instructor = $instructor;
    }

    public function getJornada()
    {
        return $this->jornada;
    }

    public function setJornada($jornada)
    {
        $this->jornada = $jornada;
    }

    public function getNombreprograma()
    {
        return $this->nombreprograma;
    }

    public function setNombreprograma($nombreprograma)
    {
        $this->nombreprograma = $nombreprograma;
    }

    public function Insertar(Fichas $p){
        try {
            $consulta="INSERT INTO fichas(numeroficha,ambiente,instructor,jornada,nombreprograma) VALUES (?,?,?,?,?);";
            $this->pdo->prepare($consulta)
            ->execute(array(
                $p->getNumeroficha(),
                $p->getAmbiente(),
                $p->getInstructor(),
                $p->getJornada(),
                $p->getNombreprograma(),
            ));
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarFichas(){
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM fichas;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM fichas WHERE id_ficha=?;");
            $consulta->execute(array($id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $p=new Fichas();
            $p->setIdFichas($r->id_ficha);
            $p->setNumeroFicha($r->numeroFicha);
            $p->setAmbiente($r->ambiente);
            $p->setInstructor($r->instructor);
            $p->setJornada($r->jornada);
            $p->setNombreprograma($r->nombrePrograma);

            return $p;

        }catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(Fichas $p){
        try {
            $consulta="UPDATE fichas SET
                numeroFicha=?,
                ambiente=?,
                instructor=?,
                jornada=?,
                nombrePrograma=?
                WHERE id_ficha=?;
            ";
            $this->pdo->prepare($consulta)
            ->execute(array(
                $p->getNumeroFicha(),
                $p->getAmbiente(),
                $p->getInstructor(),
                $p->getJornada(),
                $p->getNombreprograma(),
                $p->getIdFichas()
            ));
        }catch (Exception $e){
            die($e->getMessage());
        }


    }

    public function Eliminar($id)
    {
        try {
            $consulta="DELETE FROM fichas WHERE id_ficha=?;";
            $this->pdo->prepare($consulta)
            ->execute(array($id));
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function Buscar(Fichas $p){
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM fichas WHERE numeroFicha LIKE ?; ");
            $consulta
                ->execute(array(
                    $p->getNumeroFicha()
                ));
            return $consulta->fetchAll(PDO::FETCH_OBJ);
            //echo $consulta;
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

}