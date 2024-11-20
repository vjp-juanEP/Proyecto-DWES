<?php

require 'utils/utils.php';
require_once 'entities/partner.class.php';
require_once 'entities/repository/partnersRepositorio.class.php';
require_once 'entities/File.class.php';
require_once 'entities/ImagenGaleria.class.php';
require_once 'entities/Connection.class.php';

$errores = [];
$descripcion = '';
$mensaje = '';

try {

    //Crea una conexión con la BBDD
    $config = require_once 'app/config.php';
    App::bind('config', $config);

    //Uso: realizar INSERT y SELECT con la BBDD
    $partnerRepositorio = new PartnerRepositorio();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));

        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png',];

        //Crea el fichero, lo guarda en la galería y lo copia en el directorio 'portfolio'
        $logo = new File('logo', $tiposAceptados);
        $logo->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        $logo->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTAFOLIOS);

        //Sentencias SQL de tipo INSERT
        $partner = new Partner($nombre, $logo->getFileName(), $descripcion);
        $partnerRepositorio->save($partner);
        $mensaje = 'Partner guardado';
    }
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
} finally {
    $partners = $partnerRepositorio->findAll();
}

require 'views/partners.view.php';
