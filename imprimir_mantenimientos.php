<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 28/07/2016
 * Time: 10:06 AM
 */?>
<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');

error_reporting(0);

/**********************************/
ob_start();
include_once('imprimir_mantenimientos_xls.php');
//

?>

