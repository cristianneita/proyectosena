<?php
class conexion{
    const servidor = "localhost";
    const user = "root";
    const password = "";
    const bd = "proyecto";
    public static function Conectar(){
        try{
            $conexion = new PDO
            ("mysql:host=".self::servidor.";
            dbname=".self::bd."; charset=utf8",
            self::user, self::password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
            //echo "Conexión realizada";
            return $conexion;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }

}