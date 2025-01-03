<?php 
namespace proyecto\utils;

define('ERROR_MV_UP_FILE', 9);

define('ERROR_EXECUTE_STATEMENT', 10);

define('ERROR_APP_CORE',11);

define('ERROR_CON_BD',12);

define('ERROR_INSERT_BD',13);

$errorStrings[UPLOAD_ERR_OK] = "No hay ningun error.";
$errorStrings[UPLOAD_ERR_INI_SIZE] = "El fichero es demasiado grande.";
$errorStrings[UPLOAD_ERR_FORM_SIZE] = "El fichero es demasiado grande.";
$errorStrings[UPLOAD_ERR_PARTIAL] = "No se ha podido subir el fichero.";
$errorStrings[UPLOAD_ERR_NO_FILE] = "No se ha encontrado ningun archivo";
$errorStrings[UPLOAD_ERR_NO_TMP_DIR] = "No existe el directorio temporal.";
$errorStrings[UPLOAD_ERR_CANT_WRITE] = "No se puede escribir.";
$errorStrings[UPLOAD_ERR_EXTENSION] = "Error de extensión del archivo";
//Personalizados
$errorStrings[ERROR_MV_UP_FILE] = "No se ha podido mover el archivo de destino.";
$errorStrings[ERROR_EXECUTE_STATEMENT] = "No se ham podido ejecutar la consulta";

$errorStrings[ERROR_APP_CORE] = "No se ha encontrado la clave en el contenedor";

$errorStrings[ERROR_CON_BD] = "No se ha podido crear la conexión a la base de datos";
$errorStrings[ERROR_INSERT_BD] = 'Error al insertar en la BD';

define('ERROR_STRINGS', $errorStrings);

?>