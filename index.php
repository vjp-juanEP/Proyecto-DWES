<?php 
    require 'entities/ImagenGaleria.class.php';

    $imagenGaleria = [];

    for ($i = 0; $i < 12 ; $i++) { 
        $imagen = new ImagenGaleria( ($i + 1) . '.jpg', 'descripcion imagen ' . ($i + 1) , rand(1,1000),rand(1,500),rand(1,100));
        array_push($imagenGaleria,$imagen);
    }

    require 'views/index.view.php';
?>