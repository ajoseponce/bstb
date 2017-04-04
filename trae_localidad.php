<?php
//include('lib/DB_Conectar_Pg.php');
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getLocalidad($_REQUEST['idprovincia']);
if($result){ ?>
    <option value="" >Seleccione localidad</option>
    <?php
    foreach ($result as $t) {  ?>
        <option  <?php echo ($t->idlocalidad==1803)?"selected":""; ?>  value="<?php echo $t->idlocalidad; ?>"> <?php echo $t->localidad; ?></option>
        <?php
    }
}
?>