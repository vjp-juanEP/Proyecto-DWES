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
?>
