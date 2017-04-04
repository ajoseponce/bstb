<?php

include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getPoesProceso($_REQUEST['id_proceso']);
?>

<table class="sui-table" style="width: 100%;">
    <thead>
    <td style="width: 55%;">&nbsp;</td>
    <td style="width: 15%;"><strong>Capacitacion</strong></td>
    <td style="width: 15%;"><strong>Examen Teorico</strong></td>
    <td style="width: 20%;"><strong>Examen Practico</strong></td>
    </thead>
    <?php
    if($result){
        foreach ($result as $v) {
            $tiene_capacitacion=$consultas->busca_capacitacion_persona($v->id_poe, $_REQUEST['persona']);
            $id_usuario_persona=$consultas->busca_id_usuario($_REQUEST['persona']);
            $tiene_examen_escrito=$consultas->busca_examen_teorico($v->id_poe, $id_usuario_persona);
            $tiene_examen_practico=$consultas->busca_examen_practico($v->id_poe, $_REQUEST['persona']);
            ?>
            <tr style="border-top: 1px solid red;">
                <td><?php echo $v->descripcion; ?></td>
                <td><?php echo ($tiene_capacitacion>0)?"Tiene":"NO Tiene";  ?></td>
                <td><?php echo ($tiene_examen_escrito)?$tiene_examen_escrito:"NO Rindio";  ?></td>
                <td><?php echo ($tiene_examen_practico)?$tiene_examen_practico:"NO Tiene";  ?></td>
            </tr>

            <?php
        }
    }else{
        ?>
        <tr>
            <td colspan="3">No contiene Poes</td>
        </tr>
        <?php
    }
    ?>

</table>
<script src="js/funciones.js"></script>
