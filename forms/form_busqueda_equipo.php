<body>
<div id="page-content" >
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Buscar Equipos</h4>
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
                Tipo Equipo: 
                <select id="tipo_equipo"  onchange="filtrar_busqueda_equipo()" name="tipo_equipo" size="1">
                        <option value="0">Seleccione un tipo</option>
                    <?php if($tipo_equipo){
                        foreach ($tipo_equipo as $t) {  ?>
                            <option <?php echo ($result->tipo_equipo==$t->id_tipo_equipo)?"selected":""; ?> value="<?php echo $t->id_tipo_equipo; ?>"> <?php echo $t->armado."-".$t->descripcion; ?></option>
                    <?php
                        }
                    } ?>
                </select>
            </td>    
            <td>
                Marca: 
                <select  onchange="filtrar_busqueda_equipo()" id="marca" name="marca" size="1">
                    <option value="0">Seleccione marca</option>
                    <?php
                    $k=0;
                    if($result_marcas){
                    foreach ($result_marcas as $m) {
                    ?>
                    <option value="<?php echo $m->id_marca ?>" ><?php echo $m->descripcion ?></option>
                    <?php }} ?>
                </select>
            </td>    
        </tr>
        <tr>
            <td colspan="2">
                Ubicacion:
                <select id="lugar"  onchange="filtrar_busqueda_equipo()" name="lugar" size="1">
                    <option value="0">Seleccione un lugar</option>
                    <?php if($result_lugares){
                        foreach ($result_lugares as $t) {  ?>
                            <option <?php echo ($result->lugar==$t->id_lugar)?"selected":""; ?> value="<?php echo $t->id_lugar; ?>"> <?php echo $t->descripcion; ?></option>
                            <?php
                        }
                    } ?>
                </select>
            </td>

    </tbody>
</table>  
<div id="tabla_listado">    
<table class="table">
    <thead>
        <tr style="background: red;" >
            <th>&nbsp;</th>
            <th>Tipo/Numero</th>
            <th>Descripcion</th>
            <th>Nro Serie</th>
            <th>Modelo</th>
            <th>Ubicacion</th>
            <th>Marca</th>
<!--            <th>Primer Niv</th>-->
<!--            <th>Preventivo</th>-->
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
                <a href="controlador.php?action=cargar_mantenimiento&id_equipo=<?php echo (int)$r->id_equipo ?>">
                <img style="cursor: pointer;" src="img/mantenimiento.png"/>
                </a>
            </td>    
            <td class="span1 text-left"><?php echo $r->armado."-".$r->num_interno; ?></td>
            <td class="span1 text-left"><?php echo $r->descripcion_tipo; ?></td>
            <td class="span1 text-left"><?php echo $r->nro_serie; ?></td>
            <td class="span1 text-left"><?php echo $r->modelo; ?></td>
            <td class="span1 text-left"><?php echo $r->lugar_nombre; ?></td>
            <td class="span1 text-left"><?php echo $r->nombre_marca; ?></td>
<!--            <td class="span1 text-left">verde</td>-->
<!--            <td class="span1 text-left">rjo</td>-->
            
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