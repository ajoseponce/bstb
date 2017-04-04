<body>

<div id="page-content" >
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal" >
            <div class="block-title">
                <h4>Carga de competencia</h4>
            </div>
            <div class="block-content">

                <div class="control-group">
                    <label class="control-label" for="general-text">Personal Calificado</label>
                    <div class="controls">
                        <input  id="persona"  style="width:400px;" value="<?php echo (isset($result->persona))?$result->persona:""; ?>" name="persona"  class="input-large" type="text">
                        <input  id="personaID"  name="personaID"  class="input-large" value="<?php echo (isset($result->id_persona))?$result->id_persona:""; ?>" type="hidden">

                    </div>
                </div>
                <div class="control-group">

                    <div class="controls">
                        <input type="checkbox" <?php echo ($result->educacion=='Si')?"checked":""; ?>  name="educacion" value="S"> &nbsp;&nbsp;&nbsp;Educacion
                    </div>
                    <div class="controls">
                        <input type="checkbox" <?php echo ($result->habilidades=='Si')?"checked":""; ?> name="habilidades" value="S"> &nbsp;&nbsp;&nbsp;Habilidades
                    </div>
                    <div class="controls">
                        <input type="checkbox" <?php echo ($result->experiencia=='Si')?"checked":""; ?> name="experiencia" value="S"> &nbsp;&nbsp;&nbsp;Experiencia
                    </div>

                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Proceso</label>
                    <div class="controls">
                        <input  id="proceso" style="width:400px;"  value="<?php echo (isset($result->proceso))?$result->proceso:""; ?>" name="proceso"  class="input-large" type="text">
                        <input  id="procesoID"  name="procesoID"  class="input-large" value="<?php echo (isset($result->id_proceso))?$result->id_proceso:""; ?>" type="hidden">

                    </div>
                </div>
                <div class="control-group">
                    <div class="block-title">
                        <h4>Formacion POEs</h4>
                    </div>
                    <div class="control-group" id="poe_proceso">

                    </div>
                </div>
                <div class="control-group">
                    <div class="block-title">
                        <h4>Competencia</h4>
                    </div>
                    <div class="controls">
                            <input type="radio" <?php echo ($result->competencia=='PE')?"checked":""; ?> onclick="verifica_estado(this.value)" name="competencia" value="PE"> &nbsp;&nbsp;&nbsp;Puede ense&nacute;ar
                    </div>
                    <div class="controls">
                        <input type="radio" <?php echo ($result->competencia=='PTS')?"checked":""; ?> onclick="verifica_estado(this.value)" name="competencia" value="PTS"> &nbsp;&nbsp;&nbsp;Puede trabajar solo
                    </div>
                    <div class="controls">
                        <input type="radio" <?php echo ($result->competencia=='PTSupervisado')?"checked":""; ?> onclick="verifica_estado(this.value)" name="competencia" value="PTSupervisado"> &nbsp;&nbsp;&nbsp;Puede trabajar supervisado
                    </div>
                    <div class="controls">
                    <input type="radio" <?php echo ($result->competencia=='NPTP')?"checked":""; ?> onclick="verifica_estado(this.value)" name="competencia" value="NPTP"> &nbsp;&nbsp;&nbsp;No Puede trabajar en el puesto
                    </div>

                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Observacion</label>
                    <div class="controls">
                        <textarea  id="observacion" style="width: 650px; height: 215px;" disabled name="observacion"  value=""><?php echo ($result->observacion)?$result->observacion:""; ?> </textarea>
                    </div>
                </div>
                <div class="control-group"  style="width: 100%; color: red; font-size: 10px;">
                    Detallar cualquier condicionamiento que pudiera restringir la competencia (Ej: No saber utilizar un equipo, el mntenimiento del mismo o realizar una actividad de manera parcial como ser "la entrevista al donante", adicionalmente resaltar <br> <br> <br>aspectos positivos que mejoren la competencia, por ejemplo conocer aspectos del matenimiento prreventivo de un equipo o su calibraci&oacute;n)
                </div>
            </div>

            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_competencia">
                <input id="id_examen_practico" type="hidden" name="id_examen_practico" value="<?php echo $_REQUEST['id_examen_practico'] ?>">
                <button type="reset" onclick="location.href='controlador.php?action=listar_competencia'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                <input  type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar"/>

            </div>
        </form>
    </div>
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">

    function enviar_form(){
        var error=0

        if($("#personaID").val() ==""){
            error=1;
        }
        if($("#procesoID").val() ==""){
            error=1;
        }
        if($('input:radio[name=competencia]:checked').val()==undefined){
            error=1;
        }
       // alert($('input:radio[name=competencia]:checked').val());
        if (error==1){
            alert('Verifique completar todos los campos .Gracias');
            return false;

        }
        $("#form_datos").submit();
    }


    function verifica_estado(value) {
        if (value!="PE") {
            $("#observacion").attr("disabled", false);
        }else{
            $("#observacion").attr("disabled", false);
        }
    }

    newSuggest('persona', 'personaID', 'P');
    newSuggestProceso('proceso', 'procesoID', 'Ar');
</script>
</body>
</html>
</html><?php include_once 'footer.php' ?>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $j=jQuery.noConflict();
    $j(function() {
        $("#fecha_examen_practico").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });
</script>