<body>
    
<!--/********jquery.validity******************/-->
<link rel="stylesheet" href="validate/jquery.validity.css">
<script src="validate/jquery-1.9.0.min.js"></script>
<script src="validate/jquery.validity.js"></script>
<script>
        $(function() {
            $("#form_datos").validity(function() {
                $("#descripcion").require();
                
            });    
        });    
    </script>
<!--/**************************/-->
<div id="page-content">
    
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Datos Ubicacion</h4>
    </div>
    <div class="block-content">
        
        <form id="form_datos" method="post" class="form-horizontal" >
            <!-- Default Inputs -->
            <div class="control-group">
                <label class="control-label" for="general-text">Sector </label>
                <div class="controls">
                    <select id="id_sector" name="id_sector" size="1">
                        <option value="0">Seleccione un sector</option>
                        <?php if($sector){
                            foreach ($sector as $s) {  ?>
                                <option <?php echo ($result->id_sector==$s->id_sector)?"selected":""; ?> value="<?php echo $s->id_sector ; ?>"> <?php echo $s->descripcion; ?></option>
                                <?php
                            }
                        } ?>
                    </select>
                </div>
            </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Descripcion </label>
            <div class="controls">
                <input value="<?php echo (isset($result->descripcion))?$result->descripcion:""; ?>" id="descripcion"  name="descripcion"   class="span5" type="text">
            </div>
        </div>
        
        <div class="form-actions">
            <input id="id_lugar" type="hidden" name="id_lugar" value="<?php echo (isset($result->id_lugar))?$result->id_lugar:""; ?>">
            <input id="action" type="hidden" name="action" value="guardar_lugar">
            <button type="reset" onclick="location.href='controlador.php?action=lista_lugares'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
            </button>
            <button onclick="save_datos_lugares()" type="button" class="btn btn-success"><i class="icon-ok"></i> Guardar Ubicaci&oacute;n</button>
        </div>
        </form>
        </div>
        <!-- END Profile Tab Content -->
    </div>
</div>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
</body>
</html>
