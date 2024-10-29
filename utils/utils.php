<?php

function esOpcionMenuActiva(string $opcionMenu): bool {
    return strpos($_SERVER['REQUEST_URI'], $opcionMenu);
}

function existeOpcionMenuActivaEnArray(array $opcionesMenu): bool {
    foreach ($opcionesMenu as $opcionMenu) {
        if (esOpcionMenuActiva($opcionMenu)) {
            return true;
        }
    }
    return false;
}

//Función para extraer 3 partners de un array y los devuelve
function extractorPartners(array $partners) : array{
    shuffle($partners);
    return array_slice($partners,0,3);
}

?>
