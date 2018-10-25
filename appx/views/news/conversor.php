<?php
/**
 * Script llamado desde index.php mediante jquery
 * Recibe los parametros del formulario en POST
 */

# Definimos la variable de error 
$error="";

# valor de conversión
if(isset($_POST["conversion"]) && (is_numeric($_POST["conversion"]) || is_numeric(str_replace(",",".",$_POST["conversion"]))))
{
    $conversion=str_replace(",",".",$_POST["conversion"]);
}else{
    // Si hay algun error, lo guardamos para enviarlo nuevamente al script.
    $error.="Valor de conversi&oacute;n erroneo. Cambiado a 1.36.<br>";
    $conversion="aconvertir";
}

# valor a convertir
if(isset($_POST["aconvertir"]) && (is_numeric($_POST["aconvertir"]) || is_numeric(str_replace(",",".",$_POST["aconvertir"]))))
{
    $aconvertir=str_replace(",",".",$_POST["aconvertir"]);
}else{
    $error.="Valor a convertir erroneo. Puesto a 0.<br>";
    $aconvertir="conversio";
}

# calculo
$resultado=$conversion*$aconvertir;

# Devolvemos en formato json los valores para mostrar en la web
echo json_encode(array("resultado"=>$resultado, "conversion"=>$conversion, "aconvertir"=>$aconvertir, "error"=>$error));
?>