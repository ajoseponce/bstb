<?php 

    include('lib/DB_Conectar.php');
    include('classes/consultas.php');
    $result = $consultas->getEquiposFiltros($_REQUEST);
?>
<table class="table">
    <thead>
        <tr style="background: red;" >
            <th>&nbsp;</th>
            <th>Tipo/Numero</th>
            <th>Descripcion</th>
            <th>Nro Serie</th>
            <th>Modelo</th>
            <th>Marca</th>
            

        </tr>
    </thead>

    <tbody>
    <?php
    $k=0;
    if($result){
    foreach ($result as $r) {
    ?>
        <tr>
            <td class="span1 text-left">
                <a href="controlador.php?action=ver_historial_mantenimiento&id_equipo=<?php echo (int)$r->id_equipo ?>">
                <img style="cursor: pointer;" src="img/explorar.png"/>
                </a>
            </td>   
            <td class="span1 text-left"><?php echo $r->armado."-".$r->num_interno; ?></td>
            <td class="span1 text-left"><?php echo $r->equipo; ?></td>
            <td class="span1 text-left"><?php echo $r->nro_serie; ?></td>
            <td class="span1 text-left"><?php echo $r->modelo; ?></td>
            <td class="span1 text-left"><?php echo $r->nombre_marca; ?></td>
        </tr>
        <tr id="detalle_<?php echo (int)$r->id_equipo ?>" style="display:none;">
            <td colspan="5" class="span1 text-left">
            <strong>Marca: </strong><?php echo $r->nombre_marca; ?></br>
            <strong>Ubicacion: </strong><?php echo $r->lugar_nombre; ?></br>
            <strong>Representante: </strong><?php echo $r->proveedor_nombre; ?></br>
            <strong>Direccion: </strong><?php echo $r->direccion; ?></br>
            <strong>Telefono: </strong><?php echo $r->telefono; ?></br>
            </td>
            <td class="span2 text-left"><img style="cursor: pointer;" src="img/cierra_info.png" onclick="cierra_detalle(<?php echo (int)$r->id_equipo ?>)"/></td>
        </tr>
    <?php  }} ?>
    </tbody>    
</table> 
