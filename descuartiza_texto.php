<?php

include('lib/DB_Conectar.php');
include('classes/consultas.php');
$cadena_separada=explode('@',$_REQUEST[cadena]);
$cadena['apellido']=$cadena_separada[1];
$cadena['nombre']=$cadena_separada[2];
$cadena['sexo']=$cadena_separada[3];
$cadena['dni']=$cadena_separada[4];
$cadena['fecha']=$cadena_separada[6];
echo json_encode($cadena);
?>