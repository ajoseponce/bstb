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
        <h4>Datos Proveedor</h4>
    </div>
    <div class="block-content">
        
        <form id="form_datos" method="post" class="form-horizontal" >
            <!-- Default Inputs -->
        
        <div class="control-group">
            <label class="control-label" for="general-text">Descripcion </label>
            <div class="controls">
                <input value="<?php echo (isset($result->descripcion))?$result->descripcion:""; ?>" id="descripcion"  name="descripcion"   class="span5" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Direccion </label>
            <div class="controls">
                <input value="<?php echo (isset($result->direccion))?$result->direccion:""; ?>" id="direccion"  name="direccion"   class="span5" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Telefonos </label>
            <div class="controls">
                <input value="<?php echo (isset($result->telefonos))?$result->telefonos:""; ?>" id="telefonos"  name="telefonos"   class="span5" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Contacto </label>
            <div class="controls">
                <input value="<?php echo (isset($result->contacto))?$result->contacto:""; ?>" id="contacto"  name="contacto"   class="span5" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Mail </label>
            <div class="controls">
                <input value="<?php echo (isset($result->mail))?$result->mail:""; ?>" id="mail"  name="mail"   class="span5" type="text">
            </div>
        </div>
            
        
        <div class="form-actions">
            <input id="id_proveedor" type="hidden" name="id_proveedor" value="<?php echo (isset($result->id_proveedor))?$result->id_proveedor:""; ?>">
            <input id="action" type="hidden" name="action" value="guardar_proveedor">
            <button type="reset" onclick="location.href='controlador.php?action=lista_proveedores'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
            </button>
            <button onclick="save_datos_proveedores()" type="button" class="btn btn-success"><i class="icon-ok"></i> Guardar Proveedor</button>
        </div>
        </form>
        </div>
        <!-- END Profile Tab Content -->
    </div>
</div>
</body>
</html>
<?php include_once 'footer.php' ?>
