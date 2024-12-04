<?php

// Carga determinadas configuraciones en el arranque del proyecto

require_once 'entities/App.class.php';
require_once 'entities/request.class.php';
require_once 'entities/Router.class.php';

$config = require_once 'app/config.php';
App::bind('config', $config);

$router = Router::load('utils/routes.php');
App::bind('router',$router);
?>