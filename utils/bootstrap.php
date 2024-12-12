<?php

// Carga determinadas configuraciones en el arranque del proyecto

namespace proyecto\utils;
use proyecto\entities\App;
use proyecto\entities\Router;
use proyecto\entities\repository\MyLog;

require __DIR__.'/../vendor/autoload.php';

// require_once 'entities/App.class.php';
// require_once 'entities/request.class.php';
// require_once 'entities/Router.class.php';

// require_once 'vendor/autoload.php';
// require_once 'entities/repository/myLog.class.php';

$config = require_once 'app/config.php';
App::bind('config', $config);

$router = Router::load('utils/routes.php');
App::bind('router',$router);


App::bind('logger',new MyLog('logs/proyecto.log'));

?>