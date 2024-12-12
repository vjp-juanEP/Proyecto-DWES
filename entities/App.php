<?php 
//require_once 'utils/string.php';
namespace proyecto\entities;

use proyecto\utils;
use proyecto\exceptions\AppException;

class App{
    /**
     * @var array
     */
    private static $container=[];

    /**
     * Función Almacena un objeto en container, que se encarga de asociar una clave con un contenido para posteriormente llamar a la clave y te proporcione el contenido
     * @var $clave
     * @var $valor
     * Recibe tanto la clave donde almacenar el objeto como el propio objeto
     */
    public static function bind($clave,$valor){
        self::$container[$clave] = $valor;
    }

    /**
     * Función que obtiene un objeto del container, que permite acceder al contenido de la variable static $container
     * @param string $key
     * @return mixed
     * @throws AppException
     */
    public static function get(string $key){
        //si existe el elemento lo devuelve o si no lanza la excepción
        if(!array_key_exists($key,self::$container)){
            throw new AppException(ERROR_STRINGS[ERROR_APP_CORE]);
        }
        return self::$container[$key];
    }

    //Función que obtiene la conexión, controla la creación de una conexión en caso de que exista devolveria una conexión, y en caso de que no exista una conexión la crea
    public static function getConnection(){
        if(!array_key_exists('connection',self::$container)){
            self::$container['connection'] = Connection::make();
        }

        return self::$container['connection'];
    }
}
?>