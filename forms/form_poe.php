<body>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
  $(function() {
    $("#datepicker").datepicker({
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
        monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
    });
  });
</script>
<div id="page-content">
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Datos POES</h4>
    </div>
    <div class="block-content">
        
        <form action="controlador.php" enctype="multipart/form-data" id="form_datos" method="post" class="form-horizontal">
         <div class="control-group">
            <label class="control-label" for="general-placeholder">Descripcion</label>
            <div class="controls">
                <!--<input type="text" id="val_username" name="val_username">-->
                <input class="span5" value="<?php echo (isset($result->descripcion))?$result->descripcion:""; ?>" type="text" id="descripcion" placeholder="" name="descripcion">
                <!--<input id="general" class="input-xlarge" type="text" name="">
                <span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-placeholder">Version</label>
            <div class="controls">
                <!--<input type="text" id="val_username" name="val_username">-->
                <input class="span5" value="<?php echo (isset($result->version))?$result->version:""; ?>" type="text" id="version" placeholder="" name="version">
                <!--<input id="general" class="input-xlarge" type="text" name="">
                <span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
            <div class="control-group">
            <label class="control-label" for="general-placeholder">Estado</label>
            <div class="controls">
                <select name="estado" id="estado">
                    <option value="A" <?php echo ($result->version=='A')?"selected":""; ?>>Alta</option>
                    <option value="B" <?php echo ($result->version=='B')?"selected":""; ?>>Baja</option>
                </select>
                
            </div>
        </div>
            <div class="control-group">
                <label class="control-label" for="general-placeholder">Permite No Conformidad</label>
                <div class="controls">
                    <select name="permite_nc" id="permite_nc">
                        <option value="S" <?php echo ($result->permite_nc=='S')?"selected":""; ?>>Si</option>
                        <option value="N" <?php echo ($result->permite_nc=='N')?"selected":""; ?>>No</option>
                    </select>

                </div>
            </div>
        <div class="control-group">
            <label class="control-label" for="general-placeholder">Fecha Version</label>
            <div class="controls">
                <!--<input type="text" id="val_username" name="val_username">-->
                <input type="text" name="fecha_version" value="<?php echo (isset($result->fecha_version))?$result->fecha_version:""; ?>" id="datepicker">
                <!--<input class="span5" value="<?php echo (isset($result->fecha_version))?$result->fecha_version:""; ?>" type="text" id="fecha_version" placeholder="" name="fecha_version">
                <!--<input id="general" class="input-xlarge" type="text" name="">
                <span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
            
        <div class="control-group">
            <label class="control-label" for="general-placeholder">Observacion</label>
            <div class="controls">
                <!--<input type="text" id="val_username" name="val_username">-->
                <input class="span5" value="<?php echo (isset($result->observacion))?$result->observacion:""; ?>" type="text" id="observacion" placeholder="" name="observacion">
                <!--<input id="general" class="input-xlarge" type="text" name="">
                <span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
        
            <div class="control-group">
            <label class="control-label" for="general-placeholder">Archivo WORD</label>
            <div class="controls">
                
                <?php 
                if(isset($result->id_poe)){
                    if (file_exists("archivos/poe_".$result->id_poe.".doc")) { 
                    ?>
                    <img src="img/word.png" /> poe_<?php echo $result->id_poe ?>.doc<a href="controlador.php?action=eliminar_doc&id_poe=<?php echo (int)$result->id_poe ?>"><img src="img/delete.png" /></a>
                    <?php    
                    }else{ ?>
                        <input type="file" id="file_doc" name="file_doc">(Solo guardara archivos WORD)
                    <?php }
                }else{ ?>
                    <input type="file" id="file_doc" name="file_doc"> (Solo guardara archivos WORD)
                <?php }
                ?> 
            </div>
        </div>
        
        <div class="form-actions">
            <input id="id_poe" type="hidden" name="id_poe" value="<?php echo ($result->id_poe)?$result->id_poe:""; ?>">
            <input id="action" type="hidden" name="action" value="guardar_poe">
            <button type="reset" onclick="location.href='controlador.php?action=lista_poe_admin'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
            <button  type="button" onclick="save_datos_poe()" class="btn btn-success"><i class="icon-ok"></i> Guardar</button>
        </div>
        </form>
        </div>
        <!-- END Profile Tab Content -->
    </div>
</div>
</body>
</html>
<?php include_once 'footer.php' ?>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $j=jQuery.noConflict();
    $j(function() {
        $j("#datepicker").datepicker({
        //$j("#fecha_no_conformidad").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });
</script>

