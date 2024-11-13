<?php 
    require 'utils/utils.php';
    require 'entities/File.class.php';
    require 'entities/ImagenGaleria.class.php';
    require 'entities/Connection.class.php';
    require 'entities/QueryBuilder.class.php';
    require 'exceptions/AppException.class.php';
    require_once 'entities/repository/imagenGaleriaRepositorio.class.php';
    require_once 'entities/repository/categoriaRepositorio.class.php';


    $errores = [];
    $descripcion = '';
    $mensaje = '';
    
    try {
        $config = require_once 'app/config.php';

        //Guardamos la configuración en el contenedor de servicios:
        App::bind('config',$config);
        //Ya no necesitamos llamar al método make
        //$connection = Connection::make($config['database']);
        //Podemos obtener la conexion llamando al método getConection
        //$connection = App::getConnection();

        $imagenRepository = new ImagenGaleriaRepositorio();
        $categoriaRepositorio = new categoriaRepositorio();
        //$queryBuilder = new QueryBuilder('imagenes','ImagenGaleria');
        

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
                $descripcion = trim(htmlspecialchars($_POST['descripcion']));
                
                $categoria = intval(trim(htmlspecialchars($_POST['categoria'])));

                $tiposAceptados = ['image/jpeg','image/jpg','image/gif','image/png'];
                $imagen = new File('imagen',$tiposAceptados);

                

                $imagen -> saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
                $imagen -> copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY,ImagenGaleria::RUTA_IMAGENES_PORTAFOLIOS);

                $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, categoria: $categoria);
                $imagenRepository->save($imagenGaleria);
                $descripcion = "";
                $mensaje = 'Imagen guardada';

                //Si llega hasta aqui, es que no ha habido errores y se ha subido la imagen
                // $sql = "INSERT INTO imagenes (nombre,descripcion) VALUES (:nombre,:descripcion)";
                // $pdoStatement = $connection->prepare($sql);
                // $parametersStatementArray = [':nombre'=>$imagen->getFileName(), ':descripcion'=>$descripcion];
                // //Lanzamos la sentecia y vemos si se ha ejecutado correctamente.
                // $response = $pdoStatement->execute($parametersStatementArray);
                // if($response === false){
                //     $errores[] = 'No se ha podido guardar la imagen en la base de datos.';
                // }else{
                //     $descripcion = '';
                //     $mensaje = 'Imagen guardada';
                // }

                // $querySQL = 'Select * from imagenes';
                // $queryStatement = $connection->query($querySQL);
                
            } 

        // $queryBuilder = new QueryBuilder('imagenes','ImagenGaleria');
        // $imagenes = $queryBuilder->findAll();
    }
    catch (FileException $exception) {
            $errores[] = $exception->getMessage();
    }catch (QueryException $exception) {
        $errores[] = $exception->getMessage();
    }catch (AppException $exception){
        $errores[] = $exception->getMessage();
    }catch(PDOException $exception){
        $errores[] = $exception->getMessage();
    }
    finally{
        //$queryBuilder = new QueryBuilder('imagenes','ImagenGaleria');
        
        $imagenes = $imagenRepository->findAll();
        $categorias = $categoriaRepositorio->findAll();
    }
    require 'views/galery.view.php';
?>
