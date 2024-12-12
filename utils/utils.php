<?php

namespace proyecto\utils;

class Utils
{
    //Función que verifica si una opción de menú está activa
    public static  function esOpcionMenuActiva(string $opcionMenu)
    {
        if ($_SERVER['REQUEST_URI'] === $opcionMenu) {
            echo 'active';
        }
        //return strpos($_SERVER['REQUEST_URI'], $opcionMenu) !== false;
    }

    //Función que verifica si alguna opción de un array de opciones de menú está activax
    public static  function existeOpcionMenuActivaEnArray(array $opcionesMenu)
    {
        foreach ($opcionesMenu as $opcionMenu) {
            if (self::esOpcionMenuActiva($opcionMenu)) {
                return true;
            }
        }
        return false;
        // foreach ($opcionesMenu as $opcionMenu) {
        //     if (esOpcionMenuActiva($opcionMenu)) {
        //         return true;
        //     }
        // }
        // return false;
    }

    //Función para extraer 3 partners de un array y los devuelve
    public static  function extractorPartners(array $partners): array
    {
        shuffle($partners);
        return array_slice($partners, 0, 3);
    }


    public static  function generarHref($opcionMenu)
    {
        if ($_SERVER['REQUEST_URI'] === $opcionMenu) {
            echo '#';
        } else {
            echo $opcionMenu;
        }
    }
}
