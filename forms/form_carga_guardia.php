<body>

<div id="page-content" >
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal" >
            <div class="block-title">
                <h4>Carga Guardia</h4>
            </div>
            <div class="block-content">
                <div class="control-group">
                    <label class="control-label" for="general-text">Fecha Guardia</label>
                    <div class="controls">
                        <input type="text" name="fecha_guardia" value="<?php echo (isset($result->fecha_guardia))?$result->fecha_guardia:""; ?>" id="fecha_guardia">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Personal Tecnico</label>
                    <div class="controls">
                        <input  id="persona" value="<?php echo ($result->persona)?$result->persona:""; ?>"  name="persona"  class="input-large" value="" type="text">
                        <input  id="id_persona"  value="<?php echo ($result->id_persona)?$result->id_persona:""; ?>" name="id_persona"  class="input-large" value="" type="hidden">

                    </div>
                </div>
                <div class="control-group" >
                    <label class="control-label" for="general-text">Lugar Guardia</label>
                    <div class="controls">
                        <input  id="lugar"  name="lugar"  class="input-large" value="<?php echo (isset($result->lugar))?$result->lugar:""; ?>" type="text">
                        <input  id="id_lugar"  name="id_lugar"  class="input-large" value="<?php echo (isset($result->id_lugar))?$result->id_lugar:""; ?>" type="hidden">

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="general-text">Hora Desde</label>
                    <div class="controls">
                        <input  onfocus="mascaraHora(this,true,false)" onblur="mascaraHora(this,false,true)" onkeyup="mascaraHora(this,false,false)" name="hora_desde" class="span1" id="hora_desde" value="<?php echo (isset($result->hora_desde))?$result->hora_desde:""; ?>" />

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Hora Hasta</label>
                    <div class="controls">
                        <input  onfocus="mascaraHora(this,true,false)" onblur="mascaraHora(this,false,true)" onkeyup="mascaraHora(this,false,false)" name="hora_hasta" class="span1" id="hora_hasta" value="<?php echo (isset($result->hora_hasta))?$result->hora_hasta:""; ?>" />

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Tipo Guardia</label>
                    <div class="controls">
                        <select id="tipo_guardia" name="tipo_guardia" size="1">
                            <option value="0">Seleccione un tipo guardia</option>
                            <option <?php echo ($result->tipo_guardia=='A')?"selected":""; ?> value="A">Activa</option>
                            <option <?php echo ($result->tipo_guardia=='P')?"selected":""; ?> value="P">Pasiva</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_guardia">
                <input id="id_guardia" type="hidden" name="id_guardia" value="<?php echo $_REQUEST['id_guardia'] ?>">
                <button type="reset" onclick="location.href='controlador.php?action=listar_guardia'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                <input  type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar"/>

            </div>
        </form>
    </div>
</div>

<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script type="text/javascript">

    function enviar_form(){
        var error=0
        if($("#fecha_colectaguardia").val() ==""){
            error=1
        }

        if (error==1){
            alert('Verifique completar todos los campos .Gracias');
            return false;

        }
        $("#form_datos").submit();
    }


    newSuggest('persona', 'id_persona', 'P');
    newSuggest('lugar', 'id_lugar', 'LG');
</script>
</body>
</html><?php include_once 'footer.php' ?>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $j=jQuery.noConflict();
    $j(function() {
        $j("#fecha_guardia").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });
</script>