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
    $partnerRepositorio = new PartnerRepositorio();

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