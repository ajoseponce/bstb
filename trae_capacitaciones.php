<?php
include('lib/DB_Conectar.php');
include('classes/consultas.php');
$result = $consultas->getCapacitacionesByFiltro($_REQUEST['id_poe'],$_REQUEST['id_persona']);
?>
<table class="table">
    <thead>
    <tr style="background: red;" >
        <th style="width: 35%;"></th>
        <th style="width: 35%;">POE</th>
        <th style="width: 35%;" >Descripcion</th>
        <th style="width: 25%;" >Fecha Creacion</th>
        <th style="width: 25%;" >Duracion</th>
        <th style="width: 25%;" >Fecha Capacitacion</th>
        <th style="width: 25%;" >Capacitador</th>
        <th style="width: 5%;">Integrantes </th>
    </tr>
    </thead>

    <tbody>
    <?php
    $k=0;
    if($result){
        foreach ($result as $r) {
            ?>
            <tr>
                <td class="span1 text-left"><a href="controlador.php?action=edita_capacitacion&id_capacitacion=<?php echo (int)$r->id_capacitacion ?>"><img style="cursor: pointer;" src="img/edit.png"/></a></td>
                <td class="span1 text-left"><?php echo $r->poe ?></td>
                <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                <td class="span1 text-left"><?php echo $r->fecha_creacion; ?></td>
                <td class="span1 text-left"><?php echo $r->duracion; ?></td>
                <td class="span1 text-left"><?php echo $r->fecha_capacitacion; ?></td>
                <td class="span1 text-left"><?php echo ($r->capacitador)?$r->capacitador:$r->nombre_capacitador; ?></td>
                <td class="span1 text-left"><img src="img/integrantes.png" onclick="ver_detalle(<?php echo $r->id_capacitacion ?>)"/></td>
            </tr>
            <tr style="display:none;" id="integrantes_<?php echo $r->id_capacitacion ?>">
                <td colspan="4" class="span1 text-left">
                    <?php
                    $result_integrantes= $consultas->getIntegrantesCapacitaciones($r->id_capacitacion);
                    if($result_integrantes){
                        foreach ($result_integrantes as $i) {
                            ?>

                            <div><img src="img/person.png" /> <?php echo $i->integrante ?></div>



                        <?php  }} ?>
                </td>
                <td class="span1 text-left"><img onclick="cierre_detalle(<?php echo $r->id_capacitacion ?>)" src="img/delete.png"/></td>
            </tr>
        <?php    }} ?>
    </tbody>
</table>
