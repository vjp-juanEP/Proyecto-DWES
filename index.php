<?php 
    require 'entities/ImagenGaleria.class.php';
    require 'utils/utils.php';
    require 'entities/Partner.class.php';
    require_once 'entities/Connection.class.php';
    require_once 'entities/repository/imagenGaleriaRepositorio.class.php';
    require_once 'entities/repository/partnersRepositorio.class.php';


    
    // //Vector para rellenar la galeria de imagenes
    // $imagenGaleria = [];
    
    // for ($i = 1; $i <= 12 ; $i++) { 
    //     $imagen = new ImagenGaleria($i . '.jpg', 'descripcion imagen ' . $i , rand(1,1000),rand(1,500),rand(1,100));
    //     array_push($imagenGaleria,$imagen);
    // }
    try {
        //Conexion a la base de datos
        $config = require_once 'app/config.php';

        App::bind('config', $config);

        $imagenRepository = new ImagenGaleriaRepositorio();
        $partnerRepository = new PartnerRepositorio();

    }
    catch(AppException $exc){
        $error = $exc->getMessage();
    }catch(QueryException $exc){
        $error = $exc->getMessage();
    } finally {
        $imagenGaleria = $imagenRepository->findAll();
        $partners = $partnerRepository->findAll();
    }

    
    require 'views/index.view.php';
?>