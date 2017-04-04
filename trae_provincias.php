<?php
//include('lib/DB_Conectar_Pg.php');
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getProvincias($_REQUEST['idpais']);
if($result){ ?>
    <option value="" >Seleccione provincia</option>
    <?php
    foreach ($result as $t) {  ?>

        <option  <?php echo ($t->idprovincia==828)?"selected":""; ?>  value="<?php echo $t->idprovincia; ?>"> <?php echo $t->provincia; ?></option>
        <?php
    }
}
?>