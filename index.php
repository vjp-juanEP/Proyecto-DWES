<?php 
    require 'entities/ImagenGaleria.class.php';
    require 'utils/utils.php';
    require 'entities/Partners.class.php';

    
    //Vector para rellenar la galeria de imagenes
    $imagenGaleria = [];
    
    for ($i = 1; $i <= 12 ; $i++) { 
        $imagen = new ImagenGaleria($i . '.jpg', 'descripcion imagen ' . $i , rand(1,1000),rand(1,500),rand(1,100));
        array_push($imagenGaleria,$imagen);
    }


    //Vector para ver los partners de la página
    $partners = [];
    $auxPartners = [];

    for ($i=0; $i <= 3 ; $i++) {
        $partner = new Partner("Nombre " . $i, $i . "logo.jpg" ,"Descripción " . $i);
        array_push($partners,$partner);
    }

    //Si hay (0,3] se mostrara todos los partners si (3,infinito) se mostrara 3 partners aleatorios
    if(count($partners) <= 3){
        $auxPartners = $partners;
    }else if(count($partners) > 3){
        $auxPartners = extractorPartners($partners);
    }

    
    require 'views/index.view.php';
?>