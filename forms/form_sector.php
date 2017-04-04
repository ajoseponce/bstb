<body>

<!--/********jquery.validity******************/-->
<link rel="stylesheet" href="validate/jquery.validity.css">
<script src="validate/jquery-1.9.0.min.js"></script>
<script src="validate/jquery.validity.js"></script>
<script>
    $(function () {
        $("#form_datos").validity(function () {
            $("#descripcion").require();

        });
    });
</script>
<!--/**************************/-->
<div id="page-content">

    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Datos Sector</h4>
        </div>
        <div class="block-content">

            <form id="form_datos" method="post" class="form-horizontal">
                <!-- Default Inputs -->
                <div class="control-group">
                    <label class="control-label" for="general-text">Servicio </label>
                    <div class="controls">
                        <select id="id_servicio" name="id_servicio" size="1">
                            <option value="0">Seleccione un servicio</option>
                            <?php if($servicios){
                                foreach ($servicios as $s) {  ?>
                                    <option <?php echo ($result->id_servicio==$s->id_servicio)?"selected":""; ?> value="<?php echo $s->id_servicio ; ?>"> <?php echo $s->descripcion; ?></option>
                                    <?php
                                }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Descripcion </label>

                    <div class="controls">
                        <input value="<?php echo (isset($result->descripcion)) ? $result->descripcion : ""; ?>"
                               id="descripcion" name="descripcion" class="span5" type="text">
                    </div>
                </div>

                <div class="form-actions">
                    <input id="id_sector" type="hidden" name="id_sector"
                           value="<?php echo (isset($result->id_sector)) ? $result->id_sector : ""; ?>">
                    <input id="action" type="hidden" name="action" value="guardar_sector">
                    <button type="reset" onclick="location.href='controlador.php?action=listar_sectores'"
                            class="btn btn-danger"><i class="icon-repeat"></i> Volver
                    </button>
                    <button onclick="save_datos_sectores()" type="button" class="btn btn-success"><i
                            class="icon-ok"></i> Guardar Sector
                    </button>
                </div>
            </form>
        </div>
        <!-- END Profile Tab Content -->
    </div>
</div>
</body>
</html>
<?php include_once 'footer.php' ?>