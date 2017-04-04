<body>
<div id="page-content">
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Carga de Procesos</h4>
    </div>
    <div class="block-content">
        
        <form action="controlador.php" id="form_datos" method="post" class="form-horizontal" enctype="multipart/form-data">
         <div class="control-group">
            <label class="control-label" for="general-placeholder">Descripcion</label>
            <div class="controls">
                <!--<input type="text" id="val_username" name="val_username">-->
                <input class="span5" value="<?php echo (isset($result->descripcion))?$result->descripcion:""; ?>" type="text" id="descripcion" placeholder="" name="descripcion">
                <!--<input id="general" class="input-xlarge" type="text" name="">
                <span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
        
        
        <div class="form-actions">
            <input id="id_area" type="hidden" name="id_area" value="<?php echo ($result->id_area)?$result->id_area:""; ?>">
            <input id="action" type="hidden" name="action" value="guardar_area">
            <button type="reset" onclick="location.href='controlador.php?action=lista_areas'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
            <button  type="button" onclick="save_datos_area()" class="btn btn-success"><i class="icon-ok"></i> Guardar Proceso</button>
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
