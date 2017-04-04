<!--<link rel="stylesheet" href="css/jquery-ui.css">-->
<!--<script src="js/jquery-1.10.2.js"></script>-->
<!--<script src="js/Functions.js" type="text/javascript"></script>-->
<!--<script src="js/jquery-ui.js"></script>-->
<link rel="stylesheet" href="validate/jquery.validity.css">
<script src="validate/jquery.validity.js"></script>
<script>
        $(function() {
            $("#form_datos").validity(function() {
                $("#num_interno").require();
//                $("#num_patrimonio").require();
                //$("#descripcion").require();
                $("#nro_serie").require();
                $("#sector").require();
            });    
            $("#fecha_ingreso").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
            });
        });    
    </script>
<!--/**************************/-->
<body>
<div id="page-container" class="full-width">
<div id="page-content">

<div class="block block-themed block-last">
<div class="block-title">
    <h4><?php echo ($_REQUEST['id_equipo'])?"Edicion de ":"Alta de " ?>Equipo</h4>
</div>
<div class="block-content">
    
    <form id="form_datos" class="form-horizontal" action="controlador.php" method="POST" enctype="multipart/form-data">
        <!-- Default Inputs -->
        <div class="control-group">
            <label class="control-label" for="general-select">Tipo Equipo</label>
            <div class="controls">
                <select id="tipo_equipo" name="tipo_equipo" size="1">
                        <option value="0">Seleccione un tipo</option>
                    <?php if($tipo_equipo){
                        foreach ($tipo_equipo as $t) {  ?>
                            <option <?php echo ($result->tipo_equipo==$t->id_tipo_equipo)?"selected":""; ?> value="<?php echo $t->id_tipo_equipo; ?>"> <?php echo $t->descripcion."-".$t->armado; ?></option>
                    <?php
                        }
                    } ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Nro Interno</label>
            <div class="controls">
                <input value="<?php echo ($result->num_interno)?$result->num_interno:""; ?>" id="num_interno" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="num_interno">
                <img src="img/round4.png" title="Recomendar" onclick="recomendar()"/>    
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Nro Patrimonio</label>
            <div class="controls">
                <input value="<?php echo ($result->num_patrimonio)?$result->num_patrimonio:""; ?>" id="num_patrimonio" onkeypress="return _soloNumeros(event);" class="input-mini" type="text" name="num_patrimonio">

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Ficha T&eacute;cnica</label>
            <div class="controls">
                
                <?php 
                if($result->ficha_tecnica!=''){
                    if (file_exists("fichas/".$result->ficha_tecnica)) { 
                    ?>
                    <img src="./img/registro.png" /> <?php echo $result->ficha_tecnica ?><a href="controlador.php?action=eliminar_ficha_equipo&ficha_tecnica=<?php echo $result->ficha_tecnica ?>&id_equipo=<?php echo (int)$result->id_equipo ?>"><img src="img/delete.png" /></a>
                    <?php    
                    }else{ ?>
                        <input type="file" id="ficha_doc" name="ficha_doc">
                    <?php }
                }else{ ?>
                    <input type="file" id="ficha_doc" name="ficha_doc"> 
                <?php }
                ?> 
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-select">Marca</label>
            <div id="" class="controls">
                <select id="marca" name="marca" size="1">
                    <option value="0">Seleccione marca</option>
                    <?php
                    $k=0;
                    if($result_marcas){
                    foreach ($result_marcas as $m) {
                    ?>
                    <option value="<?php echo $m->id_marca ?>" <?php if($m->id_marca==$result->marca){ echo "selected='selected'";} ?> ><?php echo $m->descripcion ?></option>
                    <?php }} ?>
                </select>

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Modelo</label>
            <div class="controls">
                <input value="<?php echo ($result->modelo)?$result->modelo:""; ?>" id="modelo"  class="" type="text" name="modelo">

            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Nro Serie</label>
            <div class="controls">
                <input value="<?php echo ($result->nro_serie)?$result->nro_serie:""; ?>" id="nro_serie"  class="" type="text" name="nro_serie">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Sector</label>
            <div class="controls">
                <select id="sector" onchange="buscar_lugares(this.value)" name="sector" size="1">
                    <option value="">Seleccione sector/subsector</option>
                    <?php
                    $k=0;
                    if($result_sectores){
                        foreach ($result_sectores as $s) {
                            ?>
                            <option value="<?php echo $s->id_sector ?>" <?php if($s->id_sector==$result->id_sector){ echo "selected='selected'";} ?> ><?php echo $s->descripcion ?></option>
                        <?php }} ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Ubicacion</label>
            <div class="controls">
                <select id="lugar" name="lugar" size="1">
                    <?php if($result->id_equipo) { ?>
                        <option value="0">Seleccione ubicacion</option>
                        <?php
                        $k = 0;
                        if ($result_lugares) {
                            foreach ($result_lugares as $m) {
                                ?>
                                <option value="<?php echo $m->id_lugar ?>" <?php if ($m->id_lugar == $result->lugar) {
                                    echo "selected='selected'";
                                } ?> ><?php echo $m->descripcion; ?></option>
                            <?php }
                        }
                    }?>

                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Clasificacion</label>
            <div class="controls">
                <select id="clasificacion" name="clasificacion" size="1">
                    <option <?php if($result->clasificacion=='0'){ echo "selected='selected'";} ?> value="0">Seleccione Clasificacion</option>
                    <option <?php if($result->clasificacion=='C'){ echo "selected='selected'";} ?> value="C">Critico</option>
                    <option <?php if($result->clasificacion=='SC'){ echo "selected='selected'";} ?> value="SC">Semi Critico</option>
                    <option <?php if($result->clasificacion=='NC'){ echo "selected='selected'";} ?> value="NC">NO Critico</option>

                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Estado</label>
            <div class="controls">
                <select id="estado" name="estado" size="1">
                    <option  <?php if($result->estado=='0'){ echo "selected='selected'";} ?> value="0">Seleccione Estado</option>
                    <option  <?php if($result->estado=='EU'){ echo "selected='selected'";} ?> value="EU">Activo </option>
                    <option  <?php if($result->estado=='NU'){ echo "selected='selected'";} ?> value="NU">Inactivo</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Proveedor</label>
            <div class="controls">
                <select onchange="busca_datos_proveedor(this.value)" id="representante" name="representante" size="1">
                    <option value="0">Seleccione Representante</option>
                    <?php
                    $k=0;
                    if($result_proveedores){
                    foreach ($result_proveedores as $m) {
                    ?>
                    <option value="<?php echo $m->id_proveedor ?>" <?php if($m->id_proveedor==$result->representante){ echo "selected='selected'";} ?> ><?php echo $m->descripcion ?></option>
                    <?php }} ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Direccion</label>
            <div class="controls">
                <input value="<?php echo ($result->direccion)?$result->direccion:""; ?>" id="direccion"  class="" type="text" name="direccion">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Telefonos</label>
            <div class="controls">
                <input value="<?php echo ($result->telefono)?$result->telefono:""; ?>" id="telefono"  class="" type="text" name="telefono">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Contacto</label>
            <div class="controls">
                <input value="<?php echo ($result->contacto)?$result->contacto:""; ?>" id="contacto"  class="span5" type="text" name="contacto">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Mail</label>
            <div class="controls">
                <input value="<?php echo ($result->mail)?$result->mail:""; ?>" id="mail"  class="span5" type="text" name="mail">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Fecha Ingreso</label>
            <div class="controls">
                <input value="<?php echo ($result->fecha_ingreso)?$result->fecha_ingreso:""; ?>" id="fecha_ingreso"  class="span5" type="text" name="fecha_ingreso">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Consumo El&eacute;ctrio</label>
            <div class="controls">
                <input value="<?php echo ($result->consumo)?$result->consumo:""; ?>" id="consumo"  class="input-small" type="text" name="consumo">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Responsable Asignado</label>
            <div class="controls">
                <input value="<?php echo ($result->responsable)?$result->responsable:""; ?>" id="responsable"  class="span5" type="text" name="responsable">
                <input value="" id="responsableID" type="hidden" name="responsableID">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Manual</label>
            <div class="controls">
                <select id="manual" name="manual" onchange="vermanual(this.value)">
                    <option <?php if($result->manual=='ns'){ echo "selected='selected'";} ?>  value="ns">N/S</option>
                    <option <?php if($result->manual=='S'){ echo "selected='selected'";} ?>  value="S">Si</option>
                    <option <?php if($result->manual=='N'){ echo "selected='selected'";} ?>  value="N">No</option>
                </select>
            </div>
        </div>
       
        <div style="<?php echo ($result->manual=='S')?"display:inline;":"display:none;"; ?>" class="control-group" id="manual_equipo">
            <label class="control-label" for="general-placeholder">Archivo </label>
            
            <?php 
                if($result->manual_nombre!=''){
                    if (file_exists("manuales/".$result->manual_nombre)) { 
                    ?>
                    <img src="./img/registro.png" /> <?php echo $result->manual_nombre ?><a href="controlador.php?action=eliminar_manual_equipo&manual_nombre=<?php echo $result->manual_nombre ?>&id_equipo=<?php echo (int)$result->id_equipo ?>"><img src="img/delete.png" /></a>
                    <?php    
                    }else{ ?>
                        <input type="file" id="file_doc" name="file_doc">
                    <?php }
                }else{ ?>
                    <input type="file" id="file_doc" name="file_doc"> 
                <?php }
                ?>    
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Observaciones</label>
            <div class="controls">
                <textarea name="observaciones" id="observaciones"><?php echo $result->observaciones ?></textarea>
            </div>
        </div>
        <div class="control-group">
            <input id="id_equipo" type="hidden" name="id_equipo" value="<?php echo (isset($result->id_equipo))?$result->id_equipo:""; ?>">
            <input id="action" type="hidden" name="action" value="guardar_equipo">
            <button onclick="save_datos_equipo()" type="button" class="btn btn-success"><i class="icon-ok"></i> Guardar</button>
            <!--/**************************************/-->
            <input id="lugar_filtro" type="hidden" name="lugar_filtro" value="<?php echo $_REQUEST['lugar_filtro'] ?>">
            <input id="lugar_filtro_texto" type="hidden" name="lugar_filtro_texto" value="<?php echo $_REQUEST['lugar_filtro_texto'] ?>">
            <input id="sector_filtro" type="hidden" name="sector_filtro" value="<?php echo $_REQUEST['sector_filtro'] ?>">
            <input id="sector_filtroID" type="hidden" name="sector_filtroID" value="<?php echo $_REQUEST['sector_filtroID'] ?>">

            <input id="marca_filtro" type="hidden" name="marca_filtro" value="<?php echo $_REQUEST['marca_filtro'] ?>">
            <input id="tipo_equipo_filtro" type="hidden" name="tipo_equipo_filtro" value="<?php echo $_REQUEST['tipo_equipo_filtro'] ?>">
            <input id="num_serie" type="hidden" name="num_serie" value="<?php echo $_REQUEST['num_serie'] ?>">
            <button type="reset" onclick="VolverListaEquipo()" class="btn btn-danger"><i class="icon-repeat"></i> Volver </button>
        </div>
        </form>
    </div>
    <!-- END Profile Tab Content -->
</div>
</div>
<!-- END Modal Tabs -->
</div>

</body>
</html>

<?php include_once 'footer.php' ?>

<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script>
    newSuggest('responsable', 'responsableID', 'P');
</script>
