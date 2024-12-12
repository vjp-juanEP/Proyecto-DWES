<?php 
//require_once 'entities/QueryBuilder.class.php';

namespace proyecto\entities\repository;
use proyecto\entities\ImagenGaleria;


use proyecto\entities\QueryBuilder;
class ImagenGaleriaRepositorio extends QueryBuilder{
    public function __construct(string $table = 'imagenes',string $classEntity = ImagenGaleria::class)
    {
        parent::__construct($table,$classEntity);
    }

    // Guarda una imagen en la BD usando transacciones
    public function guardar($imagenGaleria) {
        $guardarImagen = function() use ($imagenGaleria) {
            $this->save($imagenGaleria);
            $this->incrementaNumeroImagenesCategoria($imagenGaleria->getCategoria());
        };

        $this->executeTransaction($guardarImagen);
    }
}
?>