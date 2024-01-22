<?php

class Conexion{

    private static $conexion;

    public static function obtenerConexion(){
        include_once "datosConexion.php";
        try{
            self::$conexion = new PDO(DSN, USER, PWD);
            self::$conexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $error){
            echo "Fallo en la conexion: ".$error->getMessage();
        }

        return self::$conexion;
    }

}

?>