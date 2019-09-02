<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getEquiposFiltros($_REQUEST);
?>
<table class="table">

    <thead>
    <tr style="background: #85dbd5;" >
        <th></th>
        <th>Tipo/Numero</th>
        <th>Equipo</th>
        <th>Sector</th>
        <th>Ubicaci&oacute;n</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Nro Serie</th>
        <th style="width: 5px;">&nbsp;</th>
        <th style="width: 15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $k=0;
    if($result){
        foreach ($result as $r) {

            ?>
            <tr>
                <td>
                    <a href="#modal-regular-calibracion"  data-toggle="modal" ><img style="cursor: pointer;" src="img/calibracion.png" onclick="verPopoupModalCalibracion(<?php echo (int)$r->id_equipo ?>)"/></a>
                </td>
                <td class="span1 text-left"><?php echo $r->armado."-".$r->num_interno; ?></td>
                <td class="span1 text-left"><?php echo $r->equipo; ?></td>
                <td><?php echo utf8_decode($r->sector_nombre); ?></td>
                <td><?php echo $r->lugar_nombre; ?></td>
                <td><?php echo $r->nombre_marca; ?></td>
                <td><?php echo $r->modelo; ?></td>
                <td><?php echo $r->nro_serie; ?></td>
                <td><?php echo $r->num_patrimonio; ?></td>
                <td>
                    <img style="cursor: pointer;" src="img/icono_historial_calibracion.png" onclick="ver_historial(<?php echo (int)$r->id_equipo ?>)"/>
                </td>
            </tr>

        <?php  }} ?>
    </tbody>
    <tr style="background:  #85dbd5;">
        <td colspan="13" style="color: #fff;
    padding-bottom: 10px;
    padding-left: 8px;
    padding-right: 8px;
    padding-top: 14px;
    font-size: 16px;
    font-weight: bold;">
            Total de Equipo: <?php echo count($result); ?>
        </td>
    </tr>
</table>