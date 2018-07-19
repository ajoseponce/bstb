<body>

<div id="page-content" >
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal" >
            <div class="block-title">
                <h4>Derivar Hallazgo</h4>
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
                <div class="control-group" id="poe_capa" >
                    <label class="control-label" for="general-text"><strong>Categoria</strong></label>
                    <div class="controls">
                        <label for="general-text">
                            <?php
                            echo ($result->tipo=='nc')?"No Conformidad":"";
                            echo ($result->tipo=='o')?"Observacion":"";
                            echo ($result->tipo=='m')?"Mejora":"";
                            ?>
                        </label>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label" for="general-text">Descripcion  del hallazgo:</label>
                    <div class="controls">
                        <label for="general-text">
                            <?php echo ($result->descripcion)?$result->descripcion:""; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-group" id="sector_capa" >
                        <label class="control-label" for="general-text">Area  Responsable del Tratamiento</label>
                        <div class="controls">
                            <input  id="sector_derivado"  name="sector_derivado" style="width: 500px;"  class="input-large" value="<?php echo (isset($result->sector_derivado_nombre))?$result->sector_derivado_nombre:""; ?>" type="text">
                            <input  id="sector_derivadoID"  name="sector_derivadoID" type="hidden" value="<?php echo (isset($result->sector_derivado))?$result->sector_derivado:""; ?>">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Nivel de Riesgo</label>
                    <div class="controls">
                        <select id="nivel_riesgo"  name="nivel_riesgo" size="1">
                            <option <?php echo ($result->nivel_riesgo=='')?"selected":""; ?> value="">No Aplica</option>
                            <option <?php echo ($result->nivel_riesgo=='Extremo')?"selected":""; ?> value="Extremo">Extremo</option>
                            <option <?php echo ($result->nivel_riesgo=='Alto')?"selected":""; ?> value="Alto">Alto</option>
                            <option <?php echo ($result->nivel_riesgo=='Medio')?"selected":""; ?> value="Medio">Medio</option>
                            <option <?php echo ($result->nivel_riesgo=='Bajo')?"selected":""; ?> value="Bajo">Bajo</option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_deriva_nc">
                <input id="id_no_conformidad" type="hidden" name="id_no_conformidad" value="<?php echo $_REQUEST['id_no_conformidad'] ?>">

                <button type="reset" onclick="location.href='controlador.php?action=lista_mis_no_conformidades'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                <input  type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar"/>

            </div>
        </form>
    </div>
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
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

    newSuggest('sector_derivado', 'sector_derivadoID', 'S');


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
        $j("#fecha_no_conformidad").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });
</script>