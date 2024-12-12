<?php

use proyecto\entities\Request;
use proyecto\entities\Router;

require 'utils/bootstrap.php';


try{
    require Router::load('utils/routes.php')->direct(Request::uri(),$_SERVER['REQUEST_METHOD']);
}catch(Exception $e){
    die($e->getMessage());
}

?>