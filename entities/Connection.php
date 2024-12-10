<?php
// require_once 'App.class.php';
// require_once 'utils/string.php';

namespace proyecto\entities;

use proyecto\utils;
use PDO;
use PDOException;
use proyecto\exceptions\AppException;

class Connection
{
    public static function make(){
        try{
            $config = App::get('config')['database'];

            $connection = new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],$config['password'],
                $config['options']

            );
        }catch(PDOException $PDOException){
           throw new AppException(ERROR_STRINGS[ERROR_CON_BD]);
        }
        return $connection;
    }
}

?>