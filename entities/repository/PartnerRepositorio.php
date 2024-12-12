<?php

//require_once 'entities/QueryBuilder.class.php';
namespace proyecto\entities\repository;

use proyecto\entities\Partner;
use proyecto\entities\QueryBuilder;

class PartnerRepositorio extends QueryBuilder {
    public function __construct(string $table = 'asociados',string $classEntity = Partner::class) 
    {
        parent::__construct($table,$classEntity);
    }

    public function guardar($asociado) {
        $guardarAsociado = function() use ($asociado) {
            $this->save($asociado);
        };

        $this->executeTransaction($guardarAsociado);
    }
}

?>