<body>
<div id="page-content" >
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Historial de Mantenimiento del equipo</h4>
    </div>
    <div class="block-content">
    <form id="form_datos" method="post" class="form-horizontal" >
        <div class="control-group">
            <label class="control-label" for="general-text">Equipo: </label>
            <div class="controls">
                <input type="hidden" value="<?php echo $result->tipo_equipo;?>" id="tipo_equipo" name="tipo_equipo"/>
                <?php echo $result->armado."".$result->num_interno." ".$result->descripcion ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Tipo de Mantenimiento </label>
            <div class="controls">
                <select oncha id="tipo_mantenimiento" onchange="buscar_item_matenimiento()"  name="tipo_mantenimiento">
                    <option value="0">Seleccione tipo de mantenimiento</option>
                    <option value="1">Primer nivel</option>
                    <option value="2">Preventivo</option>
                        
                </select>    
            </div>
        </div>
        <div class="control-group">
            <button type="reset" onclick="location.href='controlador.php?action=buscar_equipo_historial'" class="btn btn-danger"><i class="icon-repeat"></i>Atras</button>
        </div>
    <div id="historial_mantenimiento">
        <?php
            $result = $consultas->getMantenimientosByEquipo($_REQUEST['id_equipo']);
            ?>
            <table class="table">
                <thead>
                    <tr style="background: red;" >
                        <th>Mantenimiento</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $k=0;
                if($result){
                foreach ($result as $r) {
                $result_detalle = $consultas->getDetalleMantenimientos($r->id_mantenimiento);    
                ?>
                    <tr>
                           
                        <td class="span1 text-left"><?php echo ($r->tipo_mantenimiento==1)?"Primer Nivel":"Preventivo"; ?></td>
                        <td class="span1 text-left"><?php echo $r->fecha; ?></td>
                        <td class="span1 text-left"><?php echo $r->nombre_usuario; ?></td>
                        <td class="span2 text-left"><img style="cursor: pointer;" src="img/mas_info.png" onclick="ver_detalle(<?php echo (int)$r->id_mantenimiento ?>)"/></td>
                        
                    </tr>
                    <tr id="detalle_<?php echo (int)$r->id_mantenimiento ?>" style="display:none;">
                        <td colspan="3" class="span1 text-left">
                            <?php if($result_detalle){
                            foreach ($result_detalle as $d) { ?>
                            <strong><?php echo $d->item ?>: </strong><?php echo ($d->valor=='S')?"<img src='img/green_alert.png'>":"<img src='img/red_alert.png'>"; ?></br>
                            <?php }} ?>
                        </td>    
                        <td class="span2 text-left"><img style="cursor: pointer;" src="img/cierra_info.png" onclick="cierra_detalle(<?php echo (int)$r->id_mantenimiento ?>)"/></td></td>
                    </tr>
                <?php  }} ?>
                </tbody>    
            </table> 
    </div>   
    </form>    
    
    </div>
    
    
</div>    
</div>
</body>
</html>
<?php include_once 'footer.php' ?>


