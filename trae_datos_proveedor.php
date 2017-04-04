<?php 

    include('lib/DB_Conectar.php');
    include('classes/consultas.php');
    $result = $consultas->getProveedorByID($_REQUEST['id_proveedor']);
    echo json_encode(array("direccion"=>$result->direccion,"mail"=>$result->mail,"telefono"=>$result->telefonos,"contacto"=>$result->contacto));
?>