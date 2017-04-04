<body>

<div id="page-content">
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal">
            <div class="block-title">
                <h4>Tratamiento de No Conformidad</h4>
            </div>
            <div class="block-content">
                <div class="control-group">
                    <label class="control-label" for="general-text">Fecha Deteccion</label>

                    <div class="controls">&nbsp;
                        <label for="general-text">
                            <?php echo (isset($result->fecha_no_conformidad)) ? $result->fecha_no_conformidad : ""; ?>
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
                    <label class="control-label" for="general-text">Categoria:</label>

                    <div class="controls"><label for="general-text">
                            <?php
                            echo ($result->tipo == 'nc') ? "No Conformidad" : "";
                            echo ($result->tipo == 'o') ? "Observacion" : "";
                            echo ($result->tipo == 'm') ? "Mejora" : "";
                            ?>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="general-text">Descripcion del hallazgo:</label>

                    <div class="controls">
                        <label for="general-text">
                            <?php echo ($result->descripcion) ? $result->descripcion : ""; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group" id="sector_capa" >
                    <label class="control-label" for="general-text">Archivo Anexado</label>
                    <div class="controls">&nbsp;
                        <label for="general-text">
                            <?php if(isset($result->archivo)){ ?>
                                <a href="archivos_nc/<?php echo (isset($result->archivo))?$_REQUEST['id_no_conformidad'].'-'.$result->archivo:""; ?>" target="_blank">Ver Archivo</a>
                            <?php }else{ echo "No contiene archivos"; } ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Respuesta a no conformidad(Control y correccion)</label>

                    <div class="controls">
                        <textarea id="descripcion" style="width: 773px; height: 78px;" name="descripcion"
                                  value=""><?php echo ($result_r->descripcion) ? $result_r->descripcion : ""; ?> </textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Fecha de control y correccion</label>
                    <div class="controls">
                        <input type="text" name="fecha_control_correcion" value="<?php echo (isset($result_r->fecha_control_correcion))?$result_r->fecha_control_correcion:""; ?>" id="fecha_control_correcion">
                    </div>
                </div>
                <?php if($result->tipo == 'nc'){ ?>
                <div class="control-group">
                    <label class="control-label" for="general-text">Analisis de causas</label>

                    <div class="controls">
                        <textarea id="descripcion_analisis" style="width: 773px; height: 78px;"
                                  name="descripcion_analisis"
                                  value=""><?php echo ($result_r->descripcion_analisis) ? $result_r->descripcion_analisis : ""; ?> </textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Accion correctiva/Mejora</label>

                    <div class="controls">
                        <textarea id="descripcion_accion" style="width: 773px; height: 78px;" name="descripcion_accion"
                                  value=""><?php echo ($result_r->descripcion_accion) ? $result_r->descripcion_accion : ""; ?> </textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Fecha de Accion Correctiva/Mejora</label>

                    <div class="controls">
                        <input type="text" name="fecha_accion"
                               value="<?php echo (isset($result_r->fecha_accion)) ? $result_r->fecha_accion : ""; ?>"
                               id="fecha_accion">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Responsable de Accion Correctiva/Mejora</label>

                    <div class="controls">
                        <input id="persona"
                               value="<?php echo (isset($result_r->responsable)) ? $result_r->responsable : ""; ?>"
                               name="persona" class="input-large" type="text">
                        <input id="personaID" name="personaID" class="input-large"
                               value="<?php echo (isset($result_r->responsable_accion)) ? $result_r->responsable_accion : ""; ?>"
                               type="hidden">

                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_respuesta_nc">
                <input id="id_no_conformidad" type="hidden" name="id_no_conformidad"
                       value="<?php echo $_REQUEST['id_no_conformidad'] ?>">
                <input id="id_respuesta_nc" type="hidden" name="id_respuesta_nc"
                       value="<?php echo ($result_r->id_respuesta_nc) ? $result_r->id_respuesta_nc : ""; ?>">
                <button type="reset" onclick="location.href='controlador.php?action=lista_mis_no_conformidades'"
                        class="btn btn-danger"><i class="icon-repeat"></i> Volver
                </button>
                <input type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar"/>

            </div>
        </form>
    </div>
</div>

<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script type="text/javascript">
    function enviar_form() {
        var error = 0
        if ($("#descripcion").val() == "") {
            error = 1
        }
        if (error == 1) {
            alert('Cargue una descripcion .Gracias');
            return false;

        }
        $("#form_datos").submit();
    }

    newSuggest('persona', 'personaID', 'P');

</script>
</body>
</html>
<?php include_once 'footer.php' ?>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $j=jQuery.noConflict();
    $j(function() {
        $j("#fecha_accion").datepicker({
            dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
        });
        $j("#fecha_control_correcion").datepicker({
            dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
        });
        //
    });
</script>
