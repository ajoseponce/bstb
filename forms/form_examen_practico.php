<body>

<div id="page-content" >
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal" >
            <div class="block-title">
                <h4>Carga de Examen Practico</h4>
            </div>
            <div class="block-content">
                <div class="control-group" id="poe_capa" >
                    <label class="control-label" for="general-text">POE</label>
                    <div class="controls">
                        <input  id="poe" onchange="borra_poe()"  name="poe" style="width: 500px;"  class="input-large" value="<?php echo (isset($result->poe))?$result->poe:""; ?>" type="text">
                         <input  id="poeID"  name="poeID" type="hidden" value="<?php echo (isset($result->id_poe))?$result->id_poe:""; ?>">
                    </div>
                </div>
                <div class="control-group" id="evaluador">
                    <label class="control-label" for="general-text">Nombre del Evaluador </label>
                    <div class="controls">
                        <input  id="evaluador" name="evaluador"  class="input-large" value="<?php echo (isset($result->evaluador))?$result->evaluador:""; ?>" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Fecha Examen Practico</label>
                    <div class="controls">
                        <input type="text" name="fecha_examen_practico" value="<?php echo (isset($result->fecha_examen))?$result->fecha_examen:""; ?>" id="fecha_examen_practico">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="general-text">Personal Evaluado</label>
                    <div class="controls">
                        <input  id="persona"  value="<?php echo (isset($result->persona))?$result->persona:""; ?>" name="persona"  class="input-large" type="text">
                        <input  id="personaID"  name="personaID"  class="input-large" value="<?php echo (isset($result->id_persona))?$result->id_persona:""; ?>" type="hidden">

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Calificacion</label>
                    <div class="controls">
                        <select  id="general-select" onchange="verifica_estado(this.value)" name="calificacion" size="1">
                            <option value="0">Seleccione un calificacion</option>
                            <option  <?php echo (($result->calificacion)=='Aprobado')?"selected":""; ?> value="Aprobado">Aprobado</option>
                            <option <?php echo (($result->calificacion)=='Aprobado Condicional')?"selected":""; ?> value="Aprobado Condicional">Aprobado Condicional</option>
                            <option <?php echo (($result->calificacion)=='NO Aprobado')?"selected":""; ?>  value="NO Aprobado">NO Aprobado</option>
                        </select>

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Observacion</label>
                    <div class="controls">
                        <textarea  id="observacion"  disabled name="observacion"  value=""><?php echo ($result->observacion)?$result->observacion:""; ?> </textarea>
                    </div>
                </div>
                <div class="control-group"  style="width: 100%; color: red; font-size: 10px;">
                    Detallar cualquier incumplimiento o desvio al POE's evaluado que pudiera condicionar la competencia(Ej: No saber utilizar un equipo o realizar una actividad como ser "la entrevista al donante")
                </div>
            </div>

            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_examen_practico">
                <input id="id_examen_practico" type="hidden" name="id_examen_practico" value="<?php echo $_REQUEST['id_examen_practico'] ?>">
                <button type="reset" onclick="location.href='controlador.php?action=listar_examen_practico'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                <input  type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar"/>

            </div>
        </form>
    </div>
</div>

<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/funciones.js"></script>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>

<script type="text/javascript">

    function enviar_form(){
        var error=0
        if($("#poeID").val() ==""){
            error=1
        }
        if($("#calificacion").val() =="0"){
            error=1
        }
        if($("#fecha_examen").val() ==""){
            error=1
        }

        if (error==1){
            alert('Verifique completar todos los campos .Gracias');
            return false;

        }
        $("#form_datos").submit();
    }


    function verifica_estado(value) {
        if (value!="Aprobado") {
            $("#observacion").attr("disabled", false);
        }else{
            $("#observacion").attr("disabled", true);
        }
    }

    newSuggestSeleccion('poe', 'poeID', 'Po');
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
        $j("#fecha_examen_practico").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });
</script>