<?php 

    include('lib/DB_Conectar.php');
    include('classes/consultas.php');
    $ultimo = $consultas->getUltimoEquipo($_REQUEST['tipo_equipo']);
    echo $ultimo+1;
?>