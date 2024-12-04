<?php
//require de clases y utils
require 'utils/utils.php';
require 'entities/File.class.php';
require 'entities/ImagenGaleria.class.php';
require 'entities/Connection.class.php';
require 'entities/QueryBuilder.class.php';
require_once 'entities/repository/imagenGaleriaRepositorio.class.php';
require_once 'entities/repository/categoriaRepositorio.class.php';

//Variablesa lmacenar descripción del Partner introducida por el usuario
$descripcion = '';

try {


    $imagenRepository = new ImagenGaleriaRepositorio();
        
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));

        $categoria = trim(htmlspecialchars($_POST['categoria']));

        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);

        //Guardar el fichero en la galeria de imagenes
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
        //Copia el fichero en el directorio portfolio
        $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTAFOLIOS);

        //Creación de la imagen de la galería
        $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, categoria: $categoria);
        //Guarda las imagenes en la base de datos
        $imagenRepository->guardar($imagenGaleria);



} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
}
App::get('router')->redirect('galery');

?>