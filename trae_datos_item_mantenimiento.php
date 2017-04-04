<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
//echo $_REQUEST['numeroUnidad'];
$result = $consultas->getDatosItemByID($_REQUEST['item']);
if($result) {
    echo json_encode(array("error" => "0", "titulo" => $result->titulo, "descripcion" => $result->descripcion, "id_tipo_equipo" => $result->id_tipo_equipo, "tipo_mantenimiento" => $result->tipo_mantenimiento, "frecuencia" => $result->frecuencia, "condicion" => $result->condicion, "tiempo" => $result->tiempo, "costo" => $result->costo, "id_registro" => $result->id_registro));
}else{
    echo json_encode(array("error" => "1"));
}
?>