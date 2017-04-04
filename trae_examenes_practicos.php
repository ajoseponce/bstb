<?php

include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result_user = $consultas->getExamenPracticoByFiltro($_REQUEST['id_poe'],$_REQUEST['id_persona']);
?>
<table class="table">
    <thead>
    <tr style="background: red;" >
        <th>Poe</th>
        <th>Persona</th>
        <th style="width: 18%;">Fecha Examen Practico</th>
        <th>Calificacion</th>
        <th>Evaluador</th>
        <th>Observacion</th>
        <th style="width: 5%;">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $k=0;
    if($result_user){
        foreach ($result_user as $r) { ?>
            <tr>
                <td class="span1 text-left"><?php echo $r->poe; ?></td>
                <td class="span1 text-left"><?php echo $r->persona; ?></td>
                <td class="span1 text-center"><?php echo $r->fecha_examen; ?></td>
                <td class="span1 text-left"><?php echo $r->calificacion; ?></td>
                <td class="span1 text-left"><?php echo ($r->capacitador)?$r->capacitador:$r->nombre_capacitador; ?></td>
                <td class="span1 text-left"><?php echo $r->observacion; ?></td>
                <td class="span1 text-left">
                    <a href="controlador.php?action=edita_examen_practico&id_examen_practico=<?php echo (int)$r->id_examen_practico ?>"><img style="cursor: pointer;" src="img/edit.png"/></a>
                </td>


            </tr>
        <?php  }} ?>
    </tbody>
</table>