<?php
session_start();
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getNoConformidadByFiltro($_REQUEST['id_proceso'],$_REQUEST['id_sector'],$_REQUEST['estado'],$_REQUEST['tipo'],$_REQUEST['fecha_desde'],$_REQUEST['fecha_hasta'],$_REQUEST['origen'],$_REQUEST['numero'],$_REQUEST['nivel_riesgo']);
?>

<table class="table">
    <thead>
    <tr style="background: red;" >
        <th style="width: 5%;">Num. NC</th>
        <th style="width: 5%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">Fecha</th>
        <th style="width: 15%;">Sector</th>
        <th style="width: 15%;">Proceso</th>
        <th style="width: 35%;">Descripcion</th>
        <th style="width: 10%; text-align: center;">Tipo</th>
        <th style="width: 10%; text-align: center;">Nivel de Riesgo</th>
        <th style="width: 10%; text-align: center;">Estado</th>
        <th style="width: 10%; text-align: center;">Asignado</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
        <th style="width: 15%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $k=0;
    if($result){
        foreach ($result as $r) {
            switch ($r->estado) {
                case "N": $color="#CD0000"; break;
                case "As": $color="#FCB153"; break;
                case "R": $color="#EBDC8B"; break;
                case "C": $color="#7DCBB5"; break;
                case "A": $color="#E0E0E0"; break;
                case "V": $color="#929CBF"; break;
            }

            ?>
            <tr style="background: <?php echo $color; ?>">
                <td class="span1 text-left"><?php echo $r->id_no_conformidad; ?></td>
                <td class="span1 text-center">
                    <img src="img/usuario.png" style="cursor: pointer;"  title="Usuario de carga" data-toggle="popover" data-html="true"  data-trigger="hover" data-content="<strong><?php echo $r->informador; ?></strong>" >
                </td>
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
                <td class="span1 text-left"><?php
                    echo ($r->nivel_riesgo=='')?"No Aplica":"";
                    echo ($r->nivel_riesgo=='Extremo')?"<img src='img/semaforo_rojo.png' style='width: 35px; height: 45px;'/>Extremo":"";
                    echo ($r->nivel_riesgo=='Alto')?"<img src='img/semaforo_amarillo.png' style='width: 35px; height: 45px;'/>Alto":"";
                    echo ($r->nivel_riesgo=='Medio')?"<img src='img/semaforo_verde.png' style='width: 35px; height: 45px;'/>Medio":"";
                    echo ($r->nivel_riesgo=='Bajo')?"Bajo":"";
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
                <td class="span1 text-center">
                    <?php if($r->estado=='R' || $r->estado=='As'){ ?>
                        <img src="img/usuario.png" style="cursor: pointer;"  title="<?php echo  "Sector: ".$r->sector_derivado_desc; ?> " data-toggle="popover" data-html="true"  data-trigger="hover" data-content="<strong><?php echo  "Resp: ".$r->responsable_sector; ?></strong>" >
                    <?php }?>
                    &nbsp;
                </td>
                <td class="span1 text-center">
                    <?php if(isset($r->archivo)){ ?>
                        <a href="archivos_nc/<?php echo (isset($r->archivo))?$r->id_no_conformidad.'-'.$r->archivo:""; ?>" target="_blank"><img src="img/resultado.png" title="Imagen Adjunta" style="cursor: pointer"></a>
                    <?php }else{ echo "No contiene archivos"; } ?>
                    &nbsp;
                </td>
                <td class="span1 text-center">
                    <?php if($r->usuario==$_SESSION[id] && ($r->estado!='C' && $r->estado!='A')){ ?>
                        <a href="controlador.php?action=edita_no_conformidad&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/edit.png" title="Editar hallazgo"></a>
                    <?php } ?>
                </td>
                <td class="span1 text-center">
                    <?php if($r->estado=='N' || $r->estado=='As'){ ?>
                        <a href="controlador.php?action=derivar_no_conformidad&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/asignar.png" title="Derivar hallazgo"></a>
                    <?php }else{ echo "&nbsp;"; } ?>
                </td>
                <td class="span1 text-left">
                    <img style="cursor: pointer;" src="img/mas_info.png" onclick="ver_detalle_pop(<?php echo $r->id_no_conformidad;?>)"/>
                </td>
                <td class="span1 text-center">
                    <?php if($r->descripcion_analisis!="  " && $r->estado=='R' && $r->tipo=='nc'){ ?>
                        <a href="controlador.php?action=implementacion_nc&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/implementacion.png" title="Implementacion verificada"></a>
                    <?php }else{ echo "&nbsp;"; } ?>
                </td>
                <td class="span1 text-center">
                    <?php if($r->estado=='V'){ ?>
                        <a href="controlador.php?action=eficacia_nc&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/verifica.png" title="Implementacion verificada"></a>
                    <?php }else{ echo "&nbsp;"; } ?>
                </td>
                <?php if($r->estado!='C'){ ?>
                    <td class="span1 text-center">
                        <a href="controlador.php?action=terminar_no_conformidad&id_no_conformidad=<?php echo $r->id_no_conformidad; ?>"><img src="img/exit.png" title="Cerrar/Anular hallazgo"></a>
                    </td>
                <?php } ?>
            </tr>
            <tr style="display:none;" id="descripcion_<?php echo $r->id_no_conformidad; ?>">
                <td colspan="12">
                    <?php echo $r->descripcion; ?>
                </td>
                <td colspan="1">
                    <img onclick="cierre_descripcion(<?php echo $r->id_no_conformidad ?>)" src="img/delete.png"  style="cursor: pointer;"/>
                </td>
            </tr>
            <!--//************************************//-->
            <tr style="display:none;" id="respuesta_<?php echo $r->id_no_conformidad; ?>">
                <td colspan="7" class="span1 text-left">
                    <?php //print_t($r);
                    echo "<strong>Respuesta: </strong>".$r->respuesta." </br>";
                    echo "<strong>Analisis:</strong> ".$r->descripcion_analisis." </br>";
                    echo "<strong>Accion:</strong> ".$r->descripcion_accion." </br>";
                    echo "<strong>Fecha Accion:</strong> ".$r->fecha_accion." </br>";
                    echo "<strong>Rsponsable Accion:</strong> ".$r->responsable." </br>";
                    echo ($r->observacion_implementacion)?"<strong>Observaciones de implementacion:</strong> ".utf8_decode($r->observacion_implementacion)." </br>":"";
                    echo ($r->observacion_eficacia)?"<strong>Observaciones de eficacia:</strong> ".utf8_decode($r->observacion_eficacia)." </br>":"";
                    echo ($r->observaciones)?"<strong>Observaciones:</strong> ".$r->observaciones." </br>":"";
                    ?>
                </td>
                <td class="span1 text-left"><img onclick="cierre_detalle(<?php echo $r->id_no_conformidad ?>)" src="img/delete.png"  style="cursor: pointer;"/></td>
            </tr>
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
<script>
    //$('[data-toggle="popover"]').popover();
</script>