<?php

// Carga determinadas configuraciones en el arranque del proyecto

require_once 'entities/App.class.php';

$config = require_once 'app/config.php';
App::bind('config', $config);

?>