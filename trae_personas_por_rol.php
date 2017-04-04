<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 30/06/2016
 * Time: 09:54 AM
 */?>
<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getPersonasRol($_REQUEST['rol']);
?>

<table class="sui-table">
    <thead>
    <?php
    $k=0;
    if($result){
        foreach ($result as $r) {
            ?>
            <div style='height: 30px;' id='persona_identificador_<?php echo $r->id_persona ?>'><?php echo $r->nombre ?>&nbsp;&nbsp;&nbsp;<img src="img/delete.png" onclick="eliminar_inte('<?php echo $r->id_persona ?>')" /><input id='id_persona_inte' value='<?php echo $r->id_persona ?>' type='hidden' name='integrantes[]'/>
            </div>
        <?php }
    } ?>
    </thead>
</table>
