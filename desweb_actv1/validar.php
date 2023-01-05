<?php 
$nombre=$_POST["nombre"];
$respuesta=$_POST["g-recaptcha-response"];

$claveSecreta="6LezItEeAAAAACHeYJFtxPDHz5Egciv7NVN0fr5M";
$url="https://www.google.com/recaptcha/api/siteverify";

$validacion=file_get_contents($url."?secret=".$claveSecreta. "&response".$respuesta);
$respuesta_final=json_decode($validacion, true);
if ($respuesta_final["sucess"]==1){
    echo "válido";
}else{
    echo "no es válido";
}
 ?>