<?php 
//require_once 'entities/QueryBuilder.class.php';
namespace proyecto\entities\repository;

use proyecto\entities\Categoria;
use proyecto\entities\QueryBuilder;

class CategoriaRepositorio extends QueryBuilder {
    public function __construct(string $table = 'categorias', string $classEntity = Categoria::class)
    {
        parent::__construct($table, $classEntity);
    }
}
?>