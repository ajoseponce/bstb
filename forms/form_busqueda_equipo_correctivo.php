<body>
<div id="page-content" >
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Buscar Equipos para Solicitud de Mantenimientos Correctivos</h4>
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
                <select id="tipo_equipo_filtro"  onchange="filtrar_busqueda_equipo_solicitud()" name="tipo_equipo_filtro" size="1">
                        <option value="0">Seleccione un tipo</option>
                    <?php if($tipo_equipo){
                        foreach ($tipo_equipo as $t) {  ?>
                            <option <?php echo ($result->tipo_equipo==$t->id_tipo_equipo)?"selected":""; ?> value="<?php echo $t->id_tipo_equipo; ?>"> <?php echo $t->descripcion."-".$t->armado; ?></option>
                    <?php
                        }
                    } ?>
                </select>
            </td>    
            <td>
                Marca: 
                <select  onchange="filtrar_busqueda_equipo_solicitud()" id="marca_filtro" name="marca_filtro" size="1">
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
            <td >
                Ubicacion:
                <input  id="lugar" type="text" style="width: 350px; " name="lugar" value="<?php echo $_REQUEST['lugar_filtro_texto'];  ?>">
                <input id="lugar_filtro" value="<?php echo $_REQUEST['lugar_filtro'];  ?>" type="hidden" name="lugar_filtro">
                <img src="img/limpiar.png" style="cursor: pointer;" onclick="limpia_filtro_lugar_correc()">
            </td>
            <td>
                Sector:
                <input id="sector_filtro"  type="text" style="width: 350px; " name="sector_filtro" value="<?php echo $_REQUEST['sector_filtro'];  ?>">
                <input id="sector_filtroID" value="<?php echo $_REQUEST['sector_filtroID'];  ?>" type="hidden" name="sector_filtroID">
                <img src="img/limpiar.png" style="cursor: pointer;" onclick="limpia_filtro_sector_correc()">
            </td>
        </tr>
    </tbody>
</table>  
<div id="tabla_listado">    
    <table class="table">
        <thead>
            <tr style="background: red;" >
                <th>&nbsp;</th>
                <th>Tipo/Numero</th>
                <th>Descripcion</th>
                <th>Ubicacion</th>
                <th>Sector</th>
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
                    <a href="controlador.php?action=solicitud_mantenimiento&id_equipo=<?php echo (int)$r->id_equipo ?>">
                    <img style="cursor: pointer;" src="img/registro.png"/>
                    </a>
                </td>
                <td class="span1 text-left"><?php echo $r->armado."-".$r->num_interno; ?></td>
                <td class="span1 text-left"><?php echo $r->descripcion_tipo; ?></td>
                <td class="span1 text-left"><?php echo $r->lugar_nombre; ?></td>
                <td class="span1 text-left"><?php echo $r->sector_nombre; ?></td>
                <td class="span1 text-left"><?php echo $r->nro_serie; ?></td>
                <td class="span1 text-left"><?php echo $r->modelo; ?></td>
                <td class="span1 text-left"><?php echo $r->nombre_marca; ?></td>

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
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
    newSuggestListaCorrectivoEquipo('lugar', 'lugar_filtro', 'LE');
    newSuggestListaCorrectivoEquipo('sector_filtro', 'sector_filtroID', 'S');
</script>
<?php include_once 'footer.php' ?>S
