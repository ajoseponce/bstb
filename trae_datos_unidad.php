<?php
include('lib/DB_Conectar_Pg.php');
include('lib/DB_Conectar.php');
include('classes/consultas.php');
//echo $_REQUEST['numeroUnidad'];
$result = $consultas->getDatosUnidadByID($_REQUEST['numeroUnidad']);
if($result) {
    echo json_encode(array("error" => "0", "donacion" => $result->iddonante, "nrodonante" => $result->nrodonante, "paciente" => $result->paciente));
}else{
    echo json_encode(array("error" => "1"));
}
?>