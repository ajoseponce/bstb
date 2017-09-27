<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 03/06/2016
 * Time: 11:28 AM
 */
session_start();

$result = $consultas->getNoConformidadByFiltro($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['estado'],$_REQUEST['tipo'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],$_REQUEST['origen']);
    $k=0;
?>
    <table>
        <tr>
            <td style="text-align: left; width: 350px; height: 20px; " ><img src="img/LogoBancoMisiones1.jpg"/></td>
            <td style="text-align: right; width: 400px; height: 20px; " ><img src="img/LogoBancoMisiones.jpg"/></td>
        </tr>
        <tr>
            <td cellpadding="0" colspan="2" cellspacing="0" style="text-align: center;  border: solid 1px; width: 750px; font-size: 16px;" ><strong>Listado de Hallazgos</strong></td>
        </tr>

    </table>
<?php
    if($result){
        foreach ($result as $r) {
            ?>
            <table style="width: 100%; border: solid 1px;" cellpadding="0" cellspacing="0" >
                <tr>
                    <td style="width: 100%; "><strong>Numero:</strong> <?php echo $r->id_no_conformidad; ?></td>
                </tr>
                <tr>
                    <td><strong>Fecha y Hora:</strong> <?php echo $r->fecha." ".$r->hora; ?></td>
                </tr>
                <tr>
                    <td><strong>Sector:</strong> <?php echo $r->sector; ?></td>
                </tr>
                <tr>
                    <td><strong>Proceso: </strong><?php echo $r->proceso; ?></td>
                </tr>
                <tr>
                    <td><strong>Tipo: </strong><?php
                        echo ($r->tipo=='nc')?"No Conformidad":"";
                        echo ($r->tipo=='o')?"Observacion":"";
                        echo ($r->tipo=='m')?"Mejora":"";
                        ?></td>
                </tr>
                <tr>
                    <td><strong>Estado:</strong> <?php
                        echo ($r->estado=='N')?"Nuevo":"";
                        echo ($r->estado=='As')?"Derivado":"";
                        echo ($r->estado=='V')?"Implementado(Eficacia no Verificada)":"";
                        echo ($r->estado=='R')?"Respondido/Tratado":"";
                        echo ($r->estado=='C')?"Cerrado     ":"";
                        echo ($r->estado=='A')?"Anulada":"";
                        ?></td>
                </tr>
                <tr>
                    <td><strong>Descripcion:</strong> <?php echo $r->descripcion; ?></td>
                </tr>
            </table>

            <br>
            <!--//************************************//-->

            <!--//************************************//-->
        <?php  }
    } ?>

