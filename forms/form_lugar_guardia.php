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
            <h4>Datos Lugar de Guardia</h4>
        </div>
        <div class="block-content">

            <form id="form_datos" method="post" class="form-horizontal">
                <!-- Default Inputs -->

                <div class="control-group">
                    <label class="control-label" for="general-text">Descripcion </label>
                    <div class="controls">
                        <input value="<?php echo (isset($result->descripcion)) ? $result->descripcion : ""; ?>"
                               id="descripcion" name="descripcion" class="span5" type="text">
                    </div>
                </div>

                <div class="form-actions">
                    <input id="id_lugar_guardia" type="hidden" name="id_lugar_guardia"
                           value="<?php echo (isset($result->id_lugar_guardia)) ? $result->id_lugar_guardia : ""; ?>">
                    <input id="action" type="hidden" name="action" value="guardar_lugar_guardia">
                    <button type="reset" onclick="location.href='controlador.php?action=listar_lugar_guardias'"
                            class="btn btn-danger"><i class="icon-repeat"></i> Volver
                    </button>
                    <button onclick="save_datos_equipo()" type="button" class="btn btn-success"><i
                            class="icon-ok"></i> Guardar lugar de guardia
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