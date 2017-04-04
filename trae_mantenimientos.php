<?php
session_start();
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getMantenimientosBySector($_REQUEST['id_sector'],$_REQUEST['tipo'],$_REQUEST['tipo_equipo']);
?>
<table class="table">
    <thead>
    <tr style="background: red;" >
<!--        <th style="width: 5%;">Id Regisstro</th>-->
        <th style="width: 5%;">Tipo equipo</th>
        <th style="width: 5%;">Tipo de Mantenimiento</th>
        <th style="width: 15%;">Titulo</th>
        <th style="width: 55%;">Descripcion</th>
        <th style="width: 15%;">Sector</th>
        <th style="width: 15%;">Frecuencia</th>


    </tr>
    </thead>
    <tbody>
    <?php
    $k=0;
    if($result){
        foreach ($result as $r) {
            if($r->mantenimiento!='Observaciones'){
                switch ($r->tipo_mantenimiento) {
                    case "1": $color="#E0E0E0"; break;
                    case "2": $color="#929CBF"; break;

                }
                switch ($r->frecuencia) {
                    case "7": $frecuencia="Semanal"; break;
                    case "1": $frecuencia="Diario"; break;
                    case "15": $frecuencia="Quincena"; break;
                    case "30": $frecuencia="Mensual"; break;
                    case "90": $frecuencia="Trimestral"; break;
                    case "180": $frecuencia="Semestral"; break;
                    case "365": $frecuencia="Anual"; break;
                }
                ?>
                <tr style="background: <?php echo $color; ?>">
    <!--                <td class="span1 text-left">--><?php //echo $r->id_registro; ?><!--</td>-->
                    <td class="span1 text-left"><?php echo $r->tipo_equipo; ?></td>
                    <td class="span1 text-left"><?php switch ($r->tipo_mantenimiento) {
                            case "1": echo "Primer Nivel"; break;
                            case "2": echo "Preventivo"; break;

                        } ?></td>
                    <td class="span1 text-left"><?php echo $r->titulo; ?></td>
                    <td class="span1 text-left"><?php echo nl2br($r->mantenimiento); ?></td>
                    <td class="span1 text-left"><?php echo $r->sector; ?></td>
                    <td class="span1 text-left"><?php echo $frecuencia; ?></td>
                </tr>

            <!--//************************************//-->

            <!--//************************************//-->
        <?php  }}
    }else{
        ?>
        <tr>
            <td colspan="5" class="span1 text-left">No se encuentran mantenimientos</td>
        </tr>

        <?php
    } ?>

</table>