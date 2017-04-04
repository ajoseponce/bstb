<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getPersonasEquipo($_REQUEST['id_equipo']);
?>

<table class="sui-table">
    <thead>
    <?php
    $k=0;
    if($result){
    foreach ($result as $r) {
    ?>
    <tr style="background:#F4F4F4;">
        <th style="width: 500px; text-align: left;"><?php echo $r->nombre ?></th>
        <th style="width: 100px; text-align: left;">
            <?php
            echo ($r->tipo_mantenimiento==1)?"Primer Nivel":"";
            echo ($r->tipo_mantenimiento==2)?"Preventivo":"";
            echo ($r->tipo_mantenimiento==3)?"Calibracion":"";
            ?>
        </th>
        <th width="5%"><img src="img/delete.png" onclick="eliminarRelacionEquipoPersona(<?php echo $r->id_relacion ?>)"/></th>
    </tr>
    <?php }
    } ?>
    </thead>
</table>