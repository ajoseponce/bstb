<body>

<div id="page-content" >
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal" >
            <div class="block-title">
                <h4>Carga de colecta</h4>
            </div>
            <div class="block-content">

                <div class="control-group">
                    <label class="control-label" for="general-text">Localidad de la colecta </label>
                    <div class="controls">
                        <input  id="localidad"  name="localidad"  class="input-large" value="<?php echo (isset($result->localidad))?$result->localidad:""; ?>" type="text">
                        <input  id="localidadID"  name="localidadID"  class="input-large" value="" type="hidden">
                    </div>
                </div>
                <div class="control-group" >
                    <label class="control-label" for="general-text">Lugar de la colecta </label>
                    <div class="controls">
                        <input  id="lugar"  name="lugar"  class="input-large" value="<?php echo (isset($result->lugar))?$result->lugar:""; ?>" type="text">

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Contacto Lugar </label>
                    <div class="controls">
                        <input  id="contacto"   name="contacto"  class="input-large" value="<?php echo (isset($result->contacto))?$result->contacto:""; ?>" type="text">

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Fecha colecta</label>
                    <div class="controls">
                        <input type="text" name="fecha_colecta" value="<?php echo (isset($result->fecha_colecta))?$result->fecha_colecta:""; ?>" id="fecha_colecta">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Hora Salida</label>
                    <div class="controls">
                        <input  onfocus="mascaraHora(this,true,false)" onblur="mascaraHora(this,false,true)" onkeyup="mascaraHora(this,false,false)" name="hora_salida" class="span1" id="hora_salida" value="<?php echo (isset($result->hora_salida))?$result->hora_salida:""; ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Chofer</label>
                    <div class="controls">
                        <input  id="chofer"  name="chofer"  class="input-large"  value="<?php echo (isset($result->chofer))?$result->chofer:""; ?>" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Movil</label>
                    <div class="controls">
                        <input  id="movil"  name="movil"  class="input-large"  value="<?php echo (isset($result->movil))?$result->movil:""; ?>" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Hora Inicio</label>
                    <div class="controls">
                        <input  onfocus="mascaraHora(this,true,false)" onblur="mascaraHora(this,false,true)" onkeyup="mascaraHora(this,false,false)" name="hora_inicio" class="span1" id="hora_inicio" value="<?php echo (isset($result->hora_inicio))?$result->hora_inicio:""; ?>" />

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Hora Fin</label>
                    <div class="controls">
                        <input  onfocus="mascaraHora(this,true,false)" onblur="mascaraHora(this,false,true)" onkeyup="mascaraHora(this,false,false)" name="hora_fin" class="span1" id="hora_fin" value="<?php echo (isset($result->hora_fin))?$result->hora_fin:""; ?>" />

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Donantes Estimados</label>
                    <div class="controls">
                        <input  id="donantes_estimados"  name="donantes_estimados"  class="input-small" maxlength="3" value="<?php echo (isset($result->donantes_estimados))?$result->donantes_estimados:""; ?>" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Personal Tecnico</label>
                    <div class="controls">
                        <input  id="persona"  name="persona"  class="input-large" value="" type="text">
                        <input  id="personaID"  name="personaID"  class="input-large" value="" type="hidden">
                        <img src="img/add.png" style="cursor: pointer" onclick="agregar_persona()"/>
                    </div>
                </div>

            </div>
            <div class="block-content" id="integrantes">
                <div class="block-title">
                    <h4>Participantes</h4>
                </div>
                <?php
                $cantidad_integrantes=0;
                $result_integrantes= $consultas->getIntegrantescolecta($result->id_colecta);
                if($result_integrantes){
                    foreach ($result_integrantes as $i) {
                        $cantidad_integrantes++;
                        ?>
                        <div style='height: 30px;' id='persona_identificador_<?php echo $i->id_persona; ?>'><?php echo $i->integrante ?>&nbsp;&nbsp;&nbsp;<img src='img/delete.png' onclick='eliminar_inte(<?php echo $i->id_persona; ?>)' /><input id='id_persona_inte' value='<?php echo $i->id_persona; ?>' type='hidden' name='integrantes[]'/></div>

                    <?php  }} ?>
            </div>
            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_colecta">
                <input id="id_colecta" type="hidden" name="id_colecta" value="<?php echo $_REQUEST['id_colecta'] ?>">
                <button type="reset" onclick="location.href='controlador.php?action=listar_colecta'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                <input  type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar"/>
                <input  type="hidden" id="cantidad_intgrantes" value="<?php echo $cantidad_integrantes; ?>"/>
            </div>
        </form>
    </div>
</div>

<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script type="text/javascript">
    function agregar_persona(){
        var nombre=$("#persona").val();
        var cantidad_intgrantes=$("#cantidad_intgrantes").val();
        var id_persona=$("#personaID").val();
        if(id_persona==''){
            alert('Ingrese una persona por favor');
            return false;
        }
        $("#integrantes").append( "<div style='height: 30px;' id='persona_identificador_"+id_persona+"'>"+nombre+"&nbsp;&nbsp;&nbsp;<img src='img/delete.png' onclick='eliminar_inte("+id_persona+")' /><input id='id_persona_inte' value='"+id_persona+"' type='hidden' name='integrantes[]'/></div>" );
        $("#cantidad_intgrantes").val(parseInt($("#cantidad_intgrantes").val())+1);
        $("#persona").val("");
        $("#personaID").val("");
    }
    function enviar_form(){
        var error=0
        if($("#fecha_colecta").val() ==""){
            error=1
        }
        if($("#cantidad_intgrantes").val() =="0"){
            error=1
        }
        if (error==1){
            alert('Verifique completar todos los campos .Gracias');
            return false;

        }
        $("#form_datos").submit();
    }
    function eliminar_inte(persona) {
        $("#persona_identificador_"+persona).remove();
        $("#cantidad_intgrantes").val(parseInt($("#cantidad_intgrantes").val())-1);
    }
    newSuggest('localidad', 'localidadID', 'Loc');
    newSuggest('persona', 'personaID', 'P');
</script>
</body>
</html><?php include_once 'footer.php' ?>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $j=jQuery.noConflict();
    $j(function() {
        $j("#fecha_colecta").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });
</script>