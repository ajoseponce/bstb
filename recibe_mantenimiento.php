<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
//if($_REQUEST['apto']) {
    $id_cabecera = $consultas->save_mantenimiento_cabecera($_REQUEST);
    $id_detalle = $consultas->save_mantenimiento_detalle($id_cabecera, $_REQUEST['item'], $_REQUEST['observaciones']);
    $carpeta = 'archivos_preventivos/' . $id_cabecera;
//echo $carpeta;
    if (!file_exists($carpeta)) {
        mkdir($carpeta, 0777, true);
    }
    if (isset($_FILES["archivo"])) {

        if ($_FILES["archivo"]["error"] > 0) {
            echo $_FILES["archivo"]["error"] . "";
        } else {
            move_uploaded_file($_FILES["archivo"]["tmp_name"], "archivos_preventivos/" . $id_cabecera . "/" . $id_cabecera . '_' . $_FILES["archivo"]["name"]);
        }

    }
//}else{
//    $id_solicitud = $consultas->save_solicitud_mantenimiento($_REQUEST, $_FILES["archivo"]["name"]);
//    $carpeta = 'archivos_solicitudes/'.$id_solicitud;
//    //echo $carpeta;
//    if (!file_exists($carpeta)) {
//        mkdir($carpeta, 0777, true);
//    }
//    if (isset($_FILES["archivo"])) {
//
//        if ($_FILES["archivo"]["error"] > 0) {
//            echo $_FILES["archivo"]["error"] . "";
//        } else {
//            move_uploaded_file($_FILES["archivo"]["tmp_name"], "archivos_solicitudes/" . $id_solicitud . '_' . $_FILES["archivo"]["name"]);
//        }
//
//    }
//}

?>