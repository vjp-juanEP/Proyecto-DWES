<?php 
    require 'utils/utils.php';
    require 'utils/File.class.php';
    require 'entities/ImagenGaleria.class.php';
    require 'entities/Connection.class.php';

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
            //Si llega hasta aqui, es que no ha habido errores y se ha subido la imagen
            $connection = Connection::make();
            $sql = "INSERT INTO imagenes (nombre,descripcion) VALUES (:nombre,:descripcion)";
            $pdoStatement = $connection->prepare($sql);
            $parametersStatementArray = [':nombre'=>$imagen->getFileName(), ':descripcion'=>$descripcion];
            //Lanzamos la sentecia y vemos si se ha ejecutado correctamente.
            $response = $pdoStatement->execute($parametersStatementArray);
            if($response === false){
                $errores[] = 'No se ha podido guardar la imagen en la base de datos.';
            }else{
                $descripcion = '';
                $mensaje = 'Imagen guardada';
            }
            $querySQL = 'Select * from imagenes';
            $queryStatement = $connection->query($querySQL);
            while ($row = $queryStatement->fetch()) {
                echo "id: " . $row['id'];
                echo "Nombre: " . $row['nombre'];
                echo "Descripcion: " . $row['descripcion'];
                echo "Numero de Visualizaciones: " . $row['numVisualizaciones'];
                echo "Numero de Likes: " . $row['numLikes'];
                echo "Numero de descargas: " . $row['numDescargas'];


                // $row = ['id'=>1,'nombre'=>'asd','descripcion'=>'as',numVisualizaciones=>,numLikes=>0,numDescargas=>0]
            }
        } 
        catch (FileException $exception) {
            $errores[] = $exception->getMessage();
        }
    }
    
    require 'views/galery.view.php';
?>
