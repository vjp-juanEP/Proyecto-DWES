<?php 
    require 'utils/utils.php';
    require 'utils/File.class.php';
    require 'entities/ImagenGaleria.class.php';

    $errores = [];
    $descripcion = '';
    $mensaje = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        try {
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg','image/jpg','image/gif','image/png'];
            $imagen = new File('imagen',$tiposAceptados);

            $imagen -> saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
            $imagen -> copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY,ImagenGaleria::RUTA_IMAGENES_PORTAFOLIOS);
            $mensaje = 'Datos enviados';
        } 
        catch (FileException $exception) {
            $errores[] = $exception->getMessage();
        }
    }
    
    require 'views/galery.view.php';
?>
