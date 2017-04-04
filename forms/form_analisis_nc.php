<body>

<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $(function() {
        $("#fecha_no_conformidad").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });
</script>
<div id="page-content" >
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal" >
            <div class="block-title">
                <h4>Analisis de Causa de No Conformidad</h4>
            </div>
            <div class="block-content">
                <div class="control-group">
                    <label class="control-label" for="general-text">Fecha Deteccion</label>
                    <div class="controls">&nbsp;
                        <label  for="general-text">
                            <?php echo (isset($result->fecha_no_conformidad))?$result->fecha_no_conformidad:""; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group" id="proceso_capa" >
                    <label class="control-label" for="general-text">Proceso</label>
                    <div class="controls">&nbsp;
                        <label  for="general-text">
                            <?php echo (isset($result->proceso))?$result->proceso:""; ?>
                            <input  id="procesoID"  name="procesoID" type="hidden" value="<?php echo (isset($result->procesoID))?$result->procesoID:""; ?>">
                        </label>
                    </div>
                </div>
                <div class="control-group" id="sector_capa" >
                    <label class="control-label" for="general-text">Area</label>
                    <div class="controls">&nbsp;
                        <label for="general-text">
                            <?php echo (isset($result->sector))?$result->sector:""; ?>
                            <input  id="sectorID"  name="sectorID" type="hidden" value="<?php echo (isset($result->sectorID))?$result->sectorID:""; ?>">
                        </label>
                    </div>
                </div>
                <div class="control-group" id="poe_capa" >
                    <label class="control-label" for="general-text">Categoria</label>
                    <div class="controls">
                        <label for="general-text">
                            <?php echo (isset($result->categoria))?$result->categoria:""; ?>
                            <input  id="categoriaID"  name="categoriaID" type="hidden" value="<?php echo (isset($result->categoriaID))?$result->categoriaID:""; ?>">
                        </label>
                    </div>
                </div>
                <div class="control-group" id="poe_capa" >
                    <label class="control-label" for="general-text">Tipo de No Conformidad:</label>
                    <div class="controls"><label for="general-text">
                            <?php
                            echo ($result->tipo=='nc')?"No Conformidad":"";
                            echo ($result->tipo=='o')?"Observacion":"";
                            echo ($result->tipo=='m')?"Mejora":"";
                            ?>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="general-text">Descripcion  de la no conformidad:</label>
                    <div class="controls">
                        <label for="general-text">
                            <?php echo ($result->descripcion)?$result->descripcion:""; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Respuesta a no conformidad</label>
                    <div class="controls">
                        <textarea  id="descripcion"  name="descripcion"  value=""><?php echo ($result_r->descripcion)?$result_r->descripcion:""; ?> </textarea>
                    </div>
                </div>

            </div>

            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_analisis_nc">
                <input id="id_no_conformidad" type="hidden" name="id_no_conformidad" value="<?php echo $_REQUEST['id_no_conformidad'] ?>">
                <input id="id_analisis_nc" type="hidden" name="id_analisis_nc" value="<?php echo ($result_r->id_analisis_nc)?$result_r->id_analisis_nc:""; ?>">
                <button type="reset" onclick="location.href='controlador.php?action=lista_mis_no_conformidades'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                <input  type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar"/>

            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function enviar_form(){
        var error=0
        if($("#descripcion").val() ==""){
            error=1
        }
        if (error==1){
            alert('Cargue una descripcion .Gracias');
            return false;

        }
        $("#form_datos").submit();
    }

</script>
</body>
</html>
<?php include_once 'footer.php' ?>