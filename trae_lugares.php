<?php
include('lib/DB_Conectar_Pg.php');
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result_lugares = $consultas->getLugarBySector($_REQUEST['idsector']);
?>
    <option value="" >Seleccione lugares</option>
    <?php
    $k=0;
    if($result_lugares){
        foreach ($result_lugares as $m) {
            ?>
            <option value="<?php echo $m->id_lugar; ?>" ><?php echo $m->descripcion; ?></option>
        <?php }
    }
?>