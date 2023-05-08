<?php

class tipoResiduos
{
    private $pdo;

    private $id_tipoResiduo;
    private $categoria;
    private $tipo;

    public function __construct()
    {
        $this->pdo = conexion::Conectar();
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getId_tipoResiduo()
    {
        return $this->id_tipoResiduo;
    }

    public function setId_tipoResiduo($id_tipoResiduo)
    {
        $this->id_tipoResiduo = $id_tipoResiduo;

        return $this;
    }

    public function Insertar(tipoResiduos $p)
    {
        try {
            $consulta = "INSERT INTO tiporesiduos(categoria, tipo) VALUES (?,?)";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getCategoria(),
                    $p->getTipo(),
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM tiporesiduos;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM tiporesiduos WHERE id_tipoResiduo=?;");
            $consulta->execute(array($id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $p = new tipoResiduos();
            $p->setId_tipoResiduo($r->id_tipoResiduo);
            $p->setCategoria($r->categoria);
            $p->setTipo($r->tipo);

            return $p;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Update(tipoResiduos $p)
    {
        try {
            $consulta = "UPDATE tiporesiduos SET 
            categoria=?, 
            tipo=?
            WHERE id_tipoResiduo=?;";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getCategoria(),
                    $p->getTipo(),
                    $p->getId_tipoResiduo()
                ));

            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $consulta = "DELETE FROM tiporesiduos WHERE id_tipoResiduo=?;";
            $this->pdo->prepare($consulta)
                ->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
