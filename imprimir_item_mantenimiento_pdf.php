<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 03/06/2016
 * Time: 02:32 PM
 */
session_start();

$result = $consultas->getNoConformidadByFiltro($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['estado'],$_REQUEST['tipo']);
?>

<table>

    <tr style="background: red;" >
        <th style="width: 5%;">Num. NC</th>
        <th style="width: 5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">Fecha</th>
        <th style="width: 15%;">Sector</th>
        <th style="width: 15%;">Proceso</th>
        <th style="width: 35%;">Descripcion</th>
        <th style="width: 10%; text-align: center;">Tipo</th>
        <th style="width: 10%; text-align: center;">Estado</th>
        <th style="width: 10%; text-align: center;">Asignado</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
    </tr>
    <?php
    $k=0;
    if($result){
        foreach ($result as $r) {


            ?>
            <tr style="background: <?php echo $color; ?>">
                <td class="span1 text-left"><?php echo $r->id_no_conformidad; ?></td>

                <td class="span1 text-left"><?php echo $r->fecha." ".$r->hora; ?></td>
                <td class="span1 text-left"><?php echo $r->sector; ?></td>
                <td class="span1 text-left"><?php echo $r->proceso; ?></td>
                <td class="span1 text-left"><?php echo substr($r->descripcion, 0, 40 ); ?><img src="img/mas_descripcion.png" onclick="ver_descripcion_pop(<?php echo $r->id_no_conformidad;?>)"/></td>
                <td class="span1 text-left"><?php
                    echo ($r->tipo=='nc')?"No Conformidad":"";
                    echo ($r->tipo=='o')?"Observacion":"";
                    echo ($r->tipo=='m')?"Mejora":"";
                    ?>
                </td>
                <td class="span1 text-center"><?php
                    echo ($r->estado=='N')?"Nuevo":"";
                    echo ($r->estado=='As')?"Derivado":"";
                    echo ($r->estado=='V')?"Implementado(Eficacia no Verificada)":"";
                    echo ($r->estado=='R')?"Respondido/Tratado":"";
                    echo ($r->estado=='C')?"Cerrado     ":"";
                    echo ($r->estado=='A')?"Anulada":"";
                    ?></td>

            </tr>

            <!--//************************************//-->

            <!--//************************************//-->
        <?php  }
    }else{
        ?>
        <tr>
            <td colspan="5" class="span1 text-left">No se encuentran No conformidades</td>
        </tr>

        <?php
    } ?>

</table>