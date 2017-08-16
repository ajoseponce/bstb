<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');

$id_horario = $consultas->save_horario_cabecera($_FILES["archivo"]["name"]);

if (isset($_FILES["archivo"])) {

    if ($_FILES["archivo"]["error"] > 0) {
        echo $_FILES["archivo"]["error"] . "";
    } else {
        move_uploaded_file($_FILES["archivo"]["tmp_name"], "archivos_horarios/" . $id_horario . '_' . $_FILES["archivo"]["name"]);
    }

}
//print_r($_FILES);
//exit;
$uploaddir = "archivos_horarios/".$id_horario."_".$_FILES["archivo"]["name"];
$uploadfile = $uploaddir;
//echo $uploaddir;
//    . basename($_FILES['archivo']['name']);
require_once 'classes/PHPExcel.php';
//cargamos el archivo que deseamos leer
$objPHPExcel = PHPExcel_IOFactory::load($uploadfile);
//btenemos los datos de la hoja activa (la primera)
$objHoja = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
//recorremos las filas obtenidas
$c = 0;

foreach ($objHoja as $iIndice => $celda) {
    $id_persona_reloj = $celda['C'];
    $fecha = $celda['D'];
    $id_horario_detalle = $consultas->save_horario_persona($id_horario,$id_persona_reloj,$fecha);
    //echo "persona".$id_persona_reloj." fecha".$fecha."<br><br><br>";

    $c++;
}
echo "Registros insertados correctamente".$c ;
//die();
