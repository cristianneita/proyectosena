<?php
require "model/registroResiduos.php";
class entregaResiduos
{
    private $pdo;

    private $registroResiduo;
    private $tipoResiduos;
    private $peso;
    private $id_entregaResiduo;

    public function __construct()
    {
        $this->pdo = conexion::Conectar();
    }

    public function getRegistroResiduo()
    {
        return $this->registroResiduo;
    }

    public function setRegistroResiduo($registroResiduo)
    {
        $this->registroResiduo = $registroResiduo;

        return $this;
    }

    public function getTipoResiduos()
    {
        return $this->tipoResiduos;
    }

    public function setTipoResiduos($tipoResiduos)
    {
        $this->tipoResiduos = $tipoResiduos;

        return $this;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    public function getId_entregaResiduo()
    {
        return $this->id_entregaResiduo;
    }

    public function setId_entregaResiduo($id_entregaResiduo)
    {
        $this->id_entregaResiduo = $id_entregaResiduo;

        return $this;
    }

    public function Insertar(entregaResiduos $p)
    {
        try {
            $consulta = "INSERT INTO entregaresiduos(registroResiduo, tipoResiduo, peso) VALUES (?,?,?);";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getRegistroResiduo(),
                    $p->getTipoResiduos(),
                    $p->getPeso(),
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ActualizarEstado(registroResiduos $r)
    {
        try {
            $consulta = "UPDATE registroresiduos SET estado=?, usuarios=? WHERE id_residuos=?";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $r->getEstado(),
                    $r->getUsuarios(),
                    $r->getId_residuos()
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarEntrega()
    {
        try {
            $consulta = $this->pdo->prepare("SELECT registroresiduos.fecha, fichas.instructor ,fichas.numeroFicha, fichas.ambiente, 
                tiporesiduos.categoria, tiporesiduos.tipo, entregaresiduos.peso, registroresiduos.firmaAprendiz, 
                registroresiduos.observaciones FROM registroresiduos, fichas, tiporesiduos, entregaresiduos, usuarios 
                WHERE registroresiduos.usuarios=usuarios.id_usuarios AND registroresiduos.ficha=fichas.id_ficha 
                AND entregaresiduos.registroResiduo = registroresiduos.id_residuos AND entregaresiduos.tipoResiduo=tipoResiduos.id_tipoResiduo ORDER BY registroresiduos.fecha DESC;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function BuscarFechas(registroResiduos $p)
    {
        try {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $ficha = $_POST['ficha'];
            if (empty($ficha)) {
                $consulta = $this->pdo->prepare("SELECT registroresiduos.fecha, fichas.instructor ,fichas.numeroFicha, fichas.ambiente, 
            tiporesiduos.categoria, tiporesiduos.tipo, entregaresiduos.peso, registroresiduos.firmaAprendiz, 
            registroresiduos.observaciones FROM registroresiduos, fichas, tiporesiduos, entregaresiduos, usuarios 
            where fecha BETWEEN '$date1' and '$date2' AND registroresiduos.usuarios=usuarios.id_usuarios 
            AND registroresiduos.ficha=fichas.id_ficha AND entregaresiduos.registroResiduo = registroresiduos.id_residuos 
            AND entregaresiduos.tipoResiduo=tipoResiduos.id_tipoResiduo ORDER BY registroresiduos.fecha DESC; ");
                $consulta
                    ->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            } else {
                $consulta = $this->pdo->prepare("SELECT registroresiduos.fecha, fichas.instructor ,fichas.numeroFicha, fichas.ambiente, 
                tiporesiduos.categoria, tiporesiduos.tipo, entregaresiduos.peso, registroresiduos.firmaAprendiz, 
                registroresiduos.observaciones FROM registroresiduos, fichas, tiporesiduos, entregaresiduos, usuarios 
                where fecha BETWEEN '$date1' and '$date2' AND fichas.numeroFicha LIKE '$ficha' AND registroresiduos.usuarios=usuarios.id_usuarios 
                AND registroresiduos.ficha=fichas.id_ficha AND entregaresiduos.registroResiduo = registroresiduos.id_residuos 
                AND entregaresiduos.tipoResiduo=tipoResiduos.id_tipoResiduo ORDER BY registroresiduos.fecha DESC; ");
                $consulta
                    ->execute();
                return $consulta->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
}
