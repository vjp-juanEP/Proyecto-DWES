<?php

class Connection
{
    public static function make(){
        $option=[
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",//Para que utilice laencriptación utf8
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,//para cuando se produzca un error 

            PDO::ATTR_PERSISTENT=>true
        ];
        try{
            $connection = new PDO('mysql:host=dwes.local;dbname=proyecto;charset=utf8','userProyecto','1234',$option);
        }catch(PDOException $PDOException){
            die($PDOException->getMessage());//Detiene la ejecución del script.El string se muestra.
        }
        return $connection;
    }
}

?>