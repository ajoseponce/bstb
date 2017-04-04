<body>

<div id="page-content" >
<div class="block block-themed block-last">
    <form id="form_datos" method="post" class="form-horizontal" >
    <div class="block-title">
        <h4>Carga de Capacitacion</h4>
    </div>
    <div class="block-content">
        <?php if (!isset($result->id_poe)){
            $disable="none;";
        }
        if(!$_REQUEST['id_capacitacion']){
            $disable="";
        } ?>
        <div class="control-group" id="poe_capa" style="display:<?php echo $disable; ?> ">
            <label class="control-label" for="general-text">POE</label>
            <div class="controls">
                <input  id="poe" onchange="borra_poe()"  name="poe"  class="input-large" value="<?php echo (isset($result->poe))?$result->poe:""; ?>" type="text">
                <input  id="poeID"  name="poeID" type="hidden" value="<?php echo (isset($result->id_poe))?$result->id_poe:""; ?>">
                <!--<span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
        <?php if (!isset($result->descripcion)){
            $disable2="none;";
        }
        if(!$_REQUEST['id_capacitacion']){
            $disable2="";
        }?>
        <div class="control-group" id="descripcion_capa" style="display:<?php echo $disable2; ?> ">
            <label class="control-label" for="general-text">Nombre de la capacitacion </label>
            <div class="controls">
                <input  id="descripcion" onchange="action_descripcion()"  name="descripcion"  class="input-large" value="<?php echo (isset($result->descripcion))?$result->descripcion:""; ?>" type="text">
                <input  id="descripcionid" name="descripcionid"  class="input-large" value="" type="hidden">
            </div>
        </div>
        <div class="control-group" id="capacitador">
            <label class="control-label" for="general-text">Nombre del capacitador </label>
            <div class="controls">
                <input  id="capacitador" name="capacitador"  class="input-large" value="<?php echo (isset($result->capacitador))?$result->capacitador:""; ?>" type="text">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Fecha Capacitacion</label>
            <div class="controls">
                <input type="text" name="fecha_capacitacion" value="<?php echo (isset($result->fecha_capacitacion))?$result->fecha_capacitacion:""; ?>" id="fecha_capacitacion">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Duracion</label>
            <div class="controls">
                <input  id="duracion"  name="duracion"  class="input-small" maxlength="3" value="<?php echo (isset($result->duracion))?$result->duracion:""; ?>" type="text">
            </div>
            (en minutos)
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Participante</label>
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
        $result_integrantes= $consultas->getIntegrantesCapacitaciones($result->id_capacitacion);
        if($result_integrantes){
            foreach ($result_integrantes as $i) {
                $cantidad_integrantes++;
                ?>
                <div style='height: 30px;' id='persona_identificador_<?php echo $i->id_persona; ?>'><?php echo $i->integrante ?>&nbsp;&nbsp;&nbsp;<img src='img/delete.png' onclick='eliminar_inte(<?php echo $i->id_persona; ?>)' /><input id='id_persona_inte' value='<?php echo $i->id_persona; ?>' type='hidden' name='integrantes[]'/></div>

            <?php  }} ?>
    </div>
    <div class="form-actions">
            <input id="action" type="hidden" name="action" value="guardar_capacitacion">
            <input id="id_capacitacion" type="hidden" name="id_capacitacion" value="<?php echo $_REQUEST['id_capacitacion'] ?>">
            <button type="reset" onclick="location.href='controlador.php?action=listar_capacitacion'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
            <input  type="button" onclick="enviar_form()" class="btn btn-success" value="guardar"/>
            <input  type="hidden" id="cantidad_intgrantes" value="<?php echo $cantidad_integrantes; ?>"/>
        </div>
    </form>
</div>    
</div>

<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
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
    if($("#poeID").val() =="" && $("#descripcion").val() ==""){
        error=1
    }
    if($("#duracion").val() ==""){
        error=1
    }
    if($("#fecha_capacitacion").val() ==""){
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
function borra_poe() {
    if ($("#poe").val() == "") {
        $("#descripcion_capa").show();
        $("#poeID").attr("value","");
    }
}
function action_descripcion() {
    if ($("#descripcion").val() == "") {
        $("#poe_capa").show();
    }else{
        $("#poe_capa").hide();
        $("#poe").attr("value","");
        $("#poeID").attr("value","");
    }
}
function borra_poe() {
    if ($("#poe").val() == "") {
        $("#descripcion_capa").show();
    }
}
newSuggestSeleccion('poe', 'poeID', 'Po');
newSuggest('persona', 'personaID', 'P');
newSuggest('descripcion', 'descripcionid', 'capacita');

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
        $j("#fecha_capacitacion").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });
</script>
