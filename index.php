<?php 
    require 'entities/ImagenGaleria.class.php';
    require 'utils/utils.php';
    
    $imagenGaleria = [];
    
    for ($i = 1; $i <= 12 ; $i++) { 
        $imagen = new ImagenGaleria($i . '.jpg', 'descripcion imagen ' . $i , rand(1,1000),rand(1,500),rand(1,100));
        array_push($imagenGaleria,$imagen);
    }
    
    require 'views/index.view.php';
   
?>