<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$detalle = $consultas->getDetalleMantenimientoRealizadoPreventivo($_REQUEST['equipo'], $_REQUEST['mantenimiento']);
?>
<div class="modal-header">
    <button type="button" onclick="cieerra_detalle_mantenimiento()" class="close" data-dismiss="modal">×</button>
    <h4> Detalle Mantenimiento  </h4>
</div>
<div style="background-color: white; font-size: 17px;">
    <?php if ($detalle){ ?>
        </br>
        </br>
        <strong>Fecha Realizado:<?php echo $detalle->fecha_realizado; ?></strong> </br></br>
        </br>
        </br>
        <strong>Fecha que deberia haberse hecho:<?php echo $detalle->fecha_deberia; ?></strong> </br></br>
        <!--            <strong>--><?php //echo $detalle->detalle; ?><!--</strong> </br>-->
        <strong>Nota: <?php echo $detalle->detalle; ?></strong> </br>
        <?php
        //echo "carpeta".$detalle->id_mantenimiento_cabecera;

        ?>
        <br></br>
        <strong><?php $carpeta='archivos_preventivos/'.$detalle->id_mantenimiento_cabecera;
            echo listar_archivos($carpeta); ?></strong> </br>
    <?php }else{ ?>
        <strong>Fecha Realizado:<?php echo $detalle->fecha_realizado; ?></strong> </br>
        <strong>No Contiene informacion</strong> </br>
    <?php } ?>
</div>
<?php
function listar_archivos($carpeta){
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                    echo '<li><a target="_blank" href="'.$carpeta.'/'.$archivo.'"><img src="img/document.png"/></a></li>';
                }
            }
            closedir($dir);
        }
    }
}?>

