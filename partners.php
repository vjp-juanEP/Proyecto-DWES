<?php
//require de clases y utils
require 'utils/utils.php';
require_once 'entities/partner.class.php';
require_once 'entities/repository/partnersRepositorio.class.php';
require_once 'entities/File.class.php';
require_once 'entities/ImagenGaleria.class.php';
require_once 'entities/Connection.class.php';

//Variable para manejar errores
$errores = [];
//Variablesa lmacenar descripción del Partner introducida por el usuario
$descripcion = '';
//Variable para mostrarle al usuario información de cuando inserta un partner
$mensaje = '';

try {
    //Crea una conexión con la BBDD
    $config = require_once 'app/config.php';
    App::bind('config', $config);

    $partnerRepositorio = new PartnerRepositorio();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Variables que ha introducido el usuario
        $nombre = trim(htmlspecialchars($_POST['nombre']));
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        //Vector con el tipo de imagenes que se permiten
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png',];
        //Crea el fichero
        $logo = new File('logo', $tiposAceptados);
        //Guardar el fichero en la galeria de imagenes
        $logo->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        //Copia el fichero en el directorio portfolio
        $logo->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTAFOLIOS);

        //Sentencias SQL de tipo INSERT
        $partner = new Partner($nombre, $logo->getFileName(), $descripcion);
        //Guarda el partnert en la base de datos
        $partnerRepositorio->guardar($partner);
        
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
    //Si todo ha sido correcto guardo todo los partner de la base de datos en la variable
    $partners = $partnerRepositorio->findAll();
}


require 'views/partners.view.php';
?>