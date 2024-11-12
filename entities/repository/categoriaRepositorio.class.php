<?php 
require_once 'entities/QueryBuilder.class.php';

class categoriaRepositorio extends QueryBuilder{
    public function __construct(string $table = 'categorias',string $classEntity = 'Categoria')
    {
        parent::__construct($table,$classEntity);
    }
}
?>