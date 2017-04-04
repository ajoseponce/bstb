<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');

//$sql = "DELETE FROM mantenimiento_cabecera WHERE id_mantenimiento='".$_REQUEST['id_mante']."'";
//$conn->execute($sql);


$sql_detalle = "DELETE FROM mantenimiento_detalle WHERE id_mantenimiento_detalle='" . $_REQUEST['id_mante'] . "'";
$conn->execute($sql_detalle);

echo  "se eliminio correctamente";
?>
