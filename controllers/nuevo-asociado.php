<?php
//require de clases y utils
// require 'utils/utils.php';
// require_once 'entities/partner.class.php';
// require_once 'entities/repository/partnersRepositorio.class.php';
// require_once 'entities/File.class.php';
// require_once 'entities/ImagenGaleria.class.php';
// require_once 'entities/Connection.class.php';

namespace proyecto\controllers;

use proyecto\entities\repository\PartnerRepositorio;
use proyecto\entities\File;
use proyecto\entities\ImagenGaleria;
use proyecto\entities\Partner;
use proyecto\entities\App;

use proyecto\exceptions\FileException;
use proyecto\exceptions\QueryException;
use proyecto\exceptions\AppException;
use PDOException;

//Variablesa lmacenar descripción del Partner introducida por el usuario
$descripcion = '';

try {

    $partnerRepositorio = new PartnerRepositorio();


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
    
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
}

App::get('router')->redirect('partners');
?>