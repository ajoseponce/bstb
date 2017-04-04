<?php 
    include('lib/functions.php');
    //requireLogin(); 
    include('lib/DB_Conectar.php');
    include('classes/consultas.php');
      $result_contador = $consultas->getUltimoNumero(); 
      if($_REQUEST['operacion']=='suma'){
          $valor=$result_contador+1;
      }else{
          $valor=$result_contador-1;
      }      
      $sql = "UPDATE contador SET turno='".$valor."' WHERE id_registro=1";
      mysql_query($sql);
?> 