<body>
<div id="page-content" >
<div class="clearfix">
   <button onclick="location.href='controlador.php?action=cargar_equipo'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nuevo Equipo</button>
</div>
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Equipos</h4>
    </div>
<div class="block-content">
    <?php // echo $cartel; ?>
<table class="table">
    <thead>
        <tr style="background: red;" ><th colspan="2">Filtros de Busqueda</th></tr>
    </thead>
    <tbody>
        <tr>
            <td>
               Ubicacion: 
                <select id="lugar_filtro" onchange="filtrar_listado_equipo()" name="lugar_filtro" size="1">
                     <option value="0">Seleccione ubicacion</option>
                    <?php
                    $k=0;
                    if($result_lugares){
                    foreach ($result_lugares as $m) {
                    ?>
                    <option value="<?php echo $m->id_lugar ?>" <?php if($m->id_lugar==$result->lugar){ echo "selected='selected'";} ?> ><?php echo $m->descripcion ?></option>
                    <?php }} ?>

                </select>
            </td>    
               
        </tr>  
        <tr>
            <td>
                Tipo Equipo: 
                <select id="tipo_equipo"  onchange="filtrar_listado_equipo()" name="tipo_equipo" size="1">
                        <option value="0">Seleccione un tipo</option>
                    <?php if($tipo_equipo){
                        foreach ($tipo_equipo as $t) {  ?>
                            <option <?php echo ($result->tipo_equipo==$t->id_tipo_equipo)?"selected":""; ?> value="<?php echo $t->id_tipo_equipo; ?>"> <?php echo $t->descripcion."-".$t->armado; ?></option>
                    <?php
                        }
                    } ?>
                </select>
            </td>    
             
        </tr>  
    </tbody>
</table>  
<div id="tabla_listado">    
<table class="table">
    <thead>
        <tr style="background: red;" >
            <th>Tipo/Numero</th>
            <th>Equipo</th>
            <th>Sector/area</th>
            <th>Fecha Solicitud</th>
            <th>Estado</th>
            <th style="width: 5px;">Mas Info</th>
        </tr>
    </thead>

    <tbody>
    <?php
    $k=0;
    if($result){
    foreach ($result as $r) {
    ?>
        <tr>
            <td class="span1 text-left"><?php echo $r->armado."-".$r->num_interno; ?></td>
            <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
            <td><?php echo $r->sector; ?></td>
            <td><?php echo $r->fecha_solicitud; ?></td>
            <td><?php echo $r->estado_solicitud; ?></td>
            <td><img style="cursor: pointer;" src="img/mas_info.png" onclick="ver_detalle(<?php echo (int)$r->id_solicitud ?>)"/></td>
        </tr>
        <tr id="detalle_<?php echo (int)$r->id_solicitud ?>" style="display:none;">
            <td colspan="5" class="span1 text-left">
            <strong>Asignado a: </strong><?php echo $r->proveedor; ?></br>
            <strong>Fecha de Asignacion: </strong><?php echo $r->fecha_asignacion; ?></br>
            <strong>Observacion: </strong><?php echo $r->reparacion; ?></br>
            </td>
            <td class="span2 text-left"><img style="cursor: pointer;" src="img/cierra_info.png" onclick="cierra_detalle(<?php echo (int)$r->id_solicitud ?>)"/></td>
        </tr>
    <?php  }} ?>
    </tbody>    
</table>
</div>    
</div> 
</div>
</div>
</div>
</body>
<?php include_once 'footer.php' ?>
