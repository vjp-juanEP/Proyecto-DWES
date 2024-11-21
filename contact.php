<?php
require 'utils/utils.php';
require_once 'entities/mensaje.class.php';
require_once 'entities/repository/mensajeRepositorio.class.php';
require_once 'entities/connection.class.php';

$errores = [];

try {
    $config = require_once 'app/config.php';
    App::bind('config', $config);

    $mensajeRepository = new MensajeRepositorio();

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $array_error = [];
        $array_mostrarDatos = [];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $mensaje = $_POST["mensaje"];

        if (empty($nombre)) {
            $array_error[] = "El campo First Name no puede estar vacío";
        }
        if (empty($email)) {
            $array_error[] = "El campo Email no puede estar vacío";
        }
        if (empty($subject)) {
            $array_error[] = "El campo subject no puede estar vacío";
        }

        if (empty($array_error)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $array_error[] = "Email incorrecto";
            } else {
                $array_mostrarDatos[] = "First Name: $nombre";

                if (!empty($apellido)) {
                    $array_mostrarDatos[] = "Second name: $apellido";
                }

                $array_mostrarDatos[] = "Email: $email";
                $array_mostrarDatos[] = "Subject: $subject";

                if (!empty($mensaje)) {
                    $array_mostrarDatos[] = "Message: $mensaje";
                }
            }
        }

        $mensaje = new Mensaje($nombre, $apellido, $email, $subject, $mensaje);
        $mensajeRepository->save($mensaje);
    }
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
}


require 'views/contact.view.php';
