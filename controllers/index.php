<?php
// require 'entities/ImagenGaleria.class.php';
// require 'utils/utils.php';
// require 'entities/Partner.class.php';
// require_once 'entities/Connection.class.php';
// require_once 'entities/repository/imagenGaleriaRepositorio.class.php';
// require_once 'entities/repository/partnersRepositorio.class.php';

namespace proyecto\controllers;

use proyecto\entities\repository\ImagenGaleriaRepositorio;
use proyecto\entities\repository\PartnerRepositorio;
use proyecto\exceptions\QueryException;
use proyecto\exceptions\AppException;


$errores = [];

try {
    //Conexion a la base de datos
    //$config = require_once 'app/config.php';
    //App::bind('config', $config);

    $imagenRepository = new ImagenGaleriaRepositorio();
    $partnerRepository = new PartnerRepositorio();
} catch (AppException $exc) {
    $errores[] = $exc->getMessage();
} catch (QueryException $exc) {
    $errores[] = $exc->getMessage();
} finally {
    $imagenGaleria = $imagenRepository->findAll();
    $partners = $partnerRepository->findAll();
}


require 'views/index.view.php';

?>