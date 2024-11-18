<?php

require_once 'entities/QueryBuilder.class.php';

class PartnerRepositorio extends QueryBuilder {
    public function __construct() {
        parent::__construct('asociados', 'Partner');
    }

    public function guardar($asociado) {
            $guardarAsociado = function() use ($asociado) {
            $this->save($asociado);
        };
        $this->executeTransaction($guardarAsociado);
    }
}

?>