<?php
//require de clases y utils
require 'utils/utils.php';
require 'entities/File.class.php';
require 'entities/ImagenGaleria.class.php';
require 'entities/Connection.class.php';
require 'entities/QueryBuilder.class.php';
require 'exceptions/AppException.class.php';
require_once 'entities/repository/imagenGaleriaRepositorio.class.php';
require_once 'entities/repository/categoriaRepositorio.class.php';

//Variable para manejar errores
$errores = [];
//Variablesa lmacenar descripción del Partner introducida por el usuario
$descripcion = '';
//Variable para mostrarle al usuario información de cuando inserta un partner
$mensaje = '';

try {
    //Conexion a la base de datos
    //$config = require_once 'app/config.php';
    //App::bind('config', $config);


    $imagenRepository = new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new categoriaRepositorio();

} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
} finally {
    //Si todo ha sido correcto guardo todo los las imagenes y categoria  de la base de datos en la variable respectivas
    $imagenes = $imagenRepository->findAll();
    $categorias = $categoriaRepositorio->findAll();
}
require 'views/galery.view.php';

?>