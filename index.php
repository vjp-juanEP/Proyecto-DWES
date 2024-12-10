<?php

use proyecto\entities\Request;
use proyecto\entities\Router;

// // Carga configuraciones por defecto del proyecto
require 'utils/bootstrap.php';

// // Redirección de rutas amigables del proyecto

// $router = new Router();
// require 'utils/routes.php';

// //$uri = trim($_SERVER['REQUEST_URI'], '/');


// try{
//     require $router->direct(Request::uri());

// }catch(Exception $e){
//     die($e->getMessage());
// }

try{
    require Router::load('utils/routes.php')->direct(Request::uri(),$_SERVER['REQUEST_METHOD']);
}catch(Exception $e){
    die($e->getMessage());
}

?>