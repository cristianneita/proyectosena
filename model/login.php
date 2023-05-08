<?php
require_once "usuarios.php";

class Login extends Usuarios
{

    public function __construct()
    {
        $this->pdo = conexion::Conectar();
    }

    public function getLogin(Login $p)
    {
        try {
            $correo = $p->getCorreo();
            $password = $p->getPassword();
            $consulta = $this->pdo->prepare("SELECT * FROM usuarios WHERE correo='$correo';");
            $consulta->execute();
            $usuario = $consulta->fetchAll();
            //var_dump($usuario);
            if (count($usuario) <= 0) {
                echo "<SCRIPT >
                alert('Usuario/Contraseña incorrecto. Intentelo nuevamente');
                document.location=('?c=login&a=FormLogin');
                </SCRIPT>";
                 
                //echo "<script>alert('Usuario/Contraseña Incorrecto')</script>";
                //header("location:?c=login&a=FormLogin");
                // echo "Login Incorrecto";
            } else {
                foreach ($usuario as $user) {
                    //var_dump(password_verify($password, $user['password']));
                    if (password_verify($password, $user['password'])) {
                        echo "Login Correcto";
                        $_SESSION['user']=$user;
                        header("location:?c=login&a=FormInicio");
                    } else {
                        echo "<SCRIPT >
                                alert('Usuario/Contraseña incorrecto. Intentelo nuevamente');
                                document.location=('?c=login&a=FormLogin');
                                </SCRIPT>";
                    }
                }
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Buscar(Usuarios $p){
        try {
            $correo = $p->getCorreo();
            $consulta = $this->pdo->prepare("SELECT * FROM usuarios WHERE correo LIKE '$correo';");
            $consulta->execute();
            $usuario = $consulta->fetchAll();
            if (count($usuario)<=0) {
                echo "<SCRIPT >
                alert('Usuario incorrecto. Intentelo nuevamente');
                document.location=('?c=login&a=FormRestablecer');
                </SCRIPT>";
            }else{
                echo "<SCRIPT >
                alert('Usuario Registrado');
                document.location=('?c=login&a=Restablecer');
                </SCRIPT>";
            }
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function ActualizarPassword(Usuarios $p){
        try {
            $correo = $p->getCorreo();
            $identificacion = $p->getNumeroIdentificacion();
            $consulta = $this->pdo->prepare("SELECT * FROM usuarios WHERE correo LIKE '$correo' AND numeroIdentificacion LIKE '$identificacion';");
            $consulta->execute();
            $usuario = $consulta->fetchAll();

            if (count($usuario)<=0) {
                echo "<SCRIPT >
                alert('Usuario incorrecto. Intentelo nuevamente');
                document.location=('?c=login&a=FormRestablecer');
                </SCRIPT>";
            }else{
                $actualizar = "UPDATE usuarios SET password=? WHERE correo=?;";
                $this->pdo->prepare($actualizar)
                ->execute(array(
                    $p->getPassword(),
                    $p->getCorreo()
                ));
                echo "<SCRIPT >
                alert('Contraseña Actualiza Correctamente');
                document.location=('?c=login&a=FormLogin');
                </SCRIPT>";
            }

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
}
