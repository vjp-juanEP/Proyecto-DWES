<?php

//Función que verifica si una opción de menú está activa
function esOpcionMenuActiva(string $opcionMenu): bool {
    return strpos($_SERVER['REQUEST_URI'], $opcionMenu) !== false;
}

//Función que verifica si alguna opción de un array de opciones de menú está activax
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
