<?php 
require_once 'utils/string.php';
class App{
    /**
     * @var array
     */
    private static $container=[];

    /**
     * @var $clave
     * @var $valor
     * Recibe tanto la clave donde almacenar el objeto como el propio objeto
     */
    public static function bind($clave,$valor){
        self::$container[$clave] = $valor;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws AppException
     */
    public static function get(string $key){
        //si existe el elemento lo devuelve o si no lanza excepción
        if(!array_key_exists($key,self::$container)){
            throw new AppException(ERROR_STRINGS[ERROR_APP_CORE]);
        }
        return self::$container[$key];
    }

    public static function getConnection(){
        if(!array_key_exists('connection',self::$container)){
            self::$container['connection'] = Connection::make();
        }

        return self::$container['connection'];
    }
}
?>