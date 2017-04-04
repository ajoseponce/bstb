
<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 18/07/2016
 * Time: 07:46 PM
 */?>
<?php

include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getEquiposFiltros($_REQUEST);
?>
<table class="table">
    <thead>
    <tr style="background: red;" >
        <th>&nbsp;</th>
        <th>Tipo/Numero</th>
        <th>Descripcion</th>
        <th>Ubicacion</th>
        <th>Sector</th>
        <th>Nro Serie</th>
        <th>Modelo</th>
        <th>Marca</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $k=0;
    if($result){
        foreach ($result as $r) {
            ?>
            <tr>
                <td class="span1 text-left">
                    <a href="controlador.php?action=solicitud_mantenimiento&id_equipo=<?php echo (int)$r->id_equipo ?>">
                        <img style="cursor: pointer;" src="img/registro.png"/>
                    </a>
                </td>
                <td class="span1 text-left"><?php echo $r->armado."-".$r->num_interno; ?></td>
                <td class="span1 text-left"><?php echo $r->descripcion_tipo; ?></td>
                <td class="span1 text-left"><?php echo $r->lugar_nombre; ?></td>
                <td class="span1 text-left"><?php echo $r->sector_nombre; ?></td>
                <td class="span1 text-left"><?php echo $r->nro_serie; ?></td>
                <td class="span1 text-left"><?php echo $r->modelo; ?></td>
                <td class="span1 text-left"><?php echo $r->nombre_marca; ?></td>

            </tr>

        <?php  }} ?>
    </tbody>
</table>

