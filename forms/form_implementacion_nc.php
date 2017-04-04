<body>
<div id="page-content">
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal">
            <div class="block-title">
                <h4>Implementacion verificada</h4>
            </div>
            <div class="block-content">
                <div class="control-group">
                    <label class="control-label" for="general-text">Fecha Deteccion</label>

                    <div class="controls">&nbsp;
                        <label for="general-text">
                            <?php echo (isset($result->fecha)) ? $result->fecha : ""; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group" id="proceso_capa">
                    <label class="control-label" for="general-text">Proceso</label>

                    <div class="controls">&nbsp;
                        <label for="general-text">
                            <?php echo (isset($result->proceso)) ? $result->proceso : ""; ?>
                            <input id="procesoID" name="procesoID" type="hidden"
                                   value="<?php echo (isset($result->procesoID)) ? $result->procesoID : ""; ?>">
                        </label>
                    </div>
                </div>
                <div class="control-group" id="sector_capa">
                    <label class="control-label" for="general-text">Area</label>

                    <div class="controls">&nbsp;
                        <label for="general-text">
                            <?php echo (isset($result->sector)) ? $result->sector : ""; ?>
                            <input id="sectorID" name="sectorID" type="hidden"
                                   value="<?php echo (isset($result->sectorID)) ? $result->sectorID : ""; ?>">
                        </label>
                    </div>
                </div>
                <div class="control-group" id="poe_capa">
                    <label class="control-label" for="general-text"><strong>Categoria</strong></label>

                    <div class="controls">
                        <label for="general-text">
                            <?php
                            echo ($result->tipo == 'nc') ? "No Conformidad" : "";
                            echo ($result->tipo == 'o') ? "Observacion" : "";
                            echo ($result->tipo == 'm') ? "Mejora" : "";
                            ?>
                        </label>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label" for="general-text">Analisis:</label>

                    <div class="controls">
                        <label for="general-text">
                            <?php echo ($result->analisis) ? $result->analisis : ""; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Accion Correctiva:</label>

                    <div class="controls">
                        <label for="general-text">
                            <?php echo ($result->accion) ? $result->accion : ""; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-group" id="sector_capa">
                        <label class="control-label" for="general-text">Opciones</label>
                        <div class="controls">
                            <select id="accion" name="accion">
                                <option value="V">Cumplida</option>
                                <option value="R">No Cumplida</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Observaciones</label>

                    <div class="controls">
                        <textarea id="observaciones" style="width: 773px; height: 78px;" name="observaciones"
                                  value=""><?php echo ($result->observacion_implementacion) ? $result->observacion_implementacion : ""; ?> </textarea>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_implementacion_nc">
                <input id="id_no_conformidad" type="hidden" name="id_no_conformidad"
                       value="<?php echo $_REQUEST['id_no_conformidad'] ?>">

                <button type="reset" onclick="location.href='controlador.php?action=listar_no_conformidad'"
                        class="btn btn-danger"><i class="icon-repeat"></i> Volver
                </button>
                <input type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar"/>

            </div>
        </form>
    </div>
</div>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/funciones.js"></script>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script type="text/javascript">

    function enviar_form() {
        var error = 0
        if ($("#observaciones").val() == "") {
            error = 1
        }
        if (error == 1) {
            alert('Cargue una descripcion .Gracias');
            return false;

        }
        $("#form_datos").submit();
    }

</script>
</body>
</html>
<?php include_once 'footer.php' ?>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $j = jQuery.noConflict();
    $j(function () {
        $("#fecha_no_conformidad").datepicker({
            dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
        });
    });
</script>