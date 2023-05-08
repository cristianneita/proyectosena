<?php

class Usuarios
{
    private $pdo;

    private $id_usuarios;
    private $nombres;
    private $apellidos;
    private $tipoIdentificacion;
    private $numeroIdentificacion;
    private $rol;
    private $estado;
    private $correo;
    private $password;

    public function __construct()
    {
        $this->pdo = conexion::Conectar();
    }

    public function getIdUsuarios()
    {
        return $this->id_usuarios;
    }

    public function setIdUsuarios($id_usuarios)
    {
        $this->id_usuarios = $id_usuarios;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getTipoIdentificacion()
    {
        return $this->tipoIdentificacion;
    }

    public function setTipoIdentificacion($tipoIdentificacion)
    {
        $this->tipoIdentificacion = $tipoIdentificacion;
    }

    public function getNumeroIdentificacion()
    {
        return $this->numeroIdentificacion;
    }

    public function setNumeroIdentificacion($numeroIdentificacion)
    {
        $this->numeroIdentificacion = $numeroIdentificacion;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function Insertar(Usuarios $p)
    {

        $correo = $p->getCorreo();
        $usuario = $this->pdo->prepare("SELECT * FROM usuarios WHERE correo=? LIMIT 1;");
        $usuario->execute([$correo]);

        $numeroFilas = $usuario->rowCount();

        if ($numeroFilas <= 0) {
            try {
                $consulta = "INSERT INTO usuarios(nombres, apellidos, tipoIdentificacion, numeroIdentificacion, rol, estado, correo, password) VALUES (?,?,?,?,?,?,?,?)";
                $this->pdo->prepare($consulta)
                    ->execute(array(
                        $p->getNombres(),
                        $p->getApellidos(),
                        $p->getTipoIdentificacion(),
                        $p->getNumeroIdentificacion(),
                        $p->getRol(),
                        $p->getEstado(),
                        $p->getCorreo(),
                        $p->getPassword()
                    ));
                    echo "<SCRIPT >
                    alert('Usuario registrado exitosamente');
                    document.location=('?c=usuario&a=FormCrear2');
                    </SCRIPT>";
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else if($numeroFilas > 0){
            echo "<SCRIPT >
                    alert('El correo electronico o nombre de usuario $correo  ya se encuentra registrado. Intentelo nuevamente');
                    document.location=('?c=usuario&a=FormCrear2');
                    </SCRIPT>";           
        }
    }

    public function Listar()
    {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM usuarios;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $consulta = $this->pdo->prepare("SELECT * FROM usuarios WHERE id_usuarios=?;");
            $consulta->execute(array($id));
            $r = $consulta->fetch(PDO::FETCH_OBJ);
            $p = new Usuarios();
            $p->setIdUsuarios($r->id_usuarios);
            $p->setNombres($r->nombres);
            $p->setApellidos($r->apellidos);
            $p->setTipoIdentificacion($r->tipoIdentificacion);
            $p->setNumeroIdentificacion($r->numeroIdentificacion);
            $p->setRol($r->rol);
            $p->setEstado($r->estado);
            $p->setCorreo($r->correo);

            return $p;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function Update(Usuarios $p)
    {
        try {
            $consulta = "UPDATE usuarios SET 
            nombres=?, 
            apellidos=?,
            tipoIdentificacion=?,
            numeroIdentificacion=?,
            rol=?,
            estado=?,
            correo=?
            WHERE id_usuarios=?";
            $this->pdo->prepare($consulta)
                ->execute(array(
                    $p->getNombres(),
                    $p->getApellidos(),
                    $p->getTipoIdentificacion(),
                    $p->getNumeroIdentificacion(),
                    $p->getRol(),
                    $p->getEstado(),
                    $p->getCorreo(),
                    $p->getIdUsuarios()
                ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
}
