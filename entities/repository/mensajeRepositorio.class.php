<?php 
require_once 'entities/QueryBuilder.class.php';

class MensajeRepositorio extends QueryBuilder{
    public function __construct(string $table = 'mensaje',string $classEntity = 'Mensaje')
    {
        parent::__construct($table,$classEntity);
    }

    public function guardar($mensaje) {
        $guardarMensaje = function() use ($mensaje) {
            $this->save($mensaje);
        };

        $this->executeTransaction($guardarMensaje);
    }
}
?>