<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');

$result = $consultas->getItems($_REQUEST['tipo_equipo'], $_REQUEST['tipo_mantenimiento']);
?>
<table class="sui-table">
    <thead>
    <tr style="background: red; color: white;"  >
        <th width="15%">Titulo</th>
        <th width="50%">Descripcion</th>
        <th width="5%">Frecuencia</th>
        <th width="5%">Condicion</th>
        <th width="5%">Costo</th>
        <th width="5%">Tiempo</th>
        <th width="5%">Estado</th>
    </tr>
    </thead>
    <?php
    if($result){
        foreach ($result as $v) {
            switch ($v->frecuencia) {
                case "7": $frecuencia="Semanal"; break;
                case "1": $frecuencia="Diario"; break;
                case "15": $frecuencia="Quincena"; break;
                case "30": $frecuencia="Mensual"; break;
                case "90": $frecuencia="Trimestral"; break;
                case "180": $frecuencia="Semestral"; break;
                case "365": $frecuencia="Anual"; break;
                case "88": $frecuencia="Previo Uso"; break;
                case "99": $frecuencia="Posterior Uso"; break;
            }?>
            <tr style="border-bottom: 2px solid dimgrey;">
                <td><?php echo $v->titulo; ?></td>
                <td><?php echo nl2br($v->descripcion); ?></td>
                <td style="text-align: center;"><?php echo $frecuencia; ?></td>
                <td style="text-align: center;"><?php echo $v->cond; ?></td>
                <td style="text-align: center;"><?php echo $v->costo; ?></td>
                <td style="text-align: center;"><?php echo $v->tiempo; ?></td>
                <td style="text-align: center;"><?php echo ($v->estado=='A')?"Alta":"Baja"; ?></td>

            </tr>
            <?php
        }}else{?>
        <tr>
            <td colspan="3">No contiene item</td>
        </tr>
        <?php
    }
    ?>

</table>
  
