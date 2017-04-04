<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/Functions.js" type="text/javascript"></script>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="validate/jquery.validity.css">
<script src="validate/jquery.validity.js"></script>
<script>
    $=jQuery.noConflict();
    $(function() {
        $("#form_datos").validity(function() {
            $("#fecha_no_conformidad").require();
            $("#hora_deteccion").require();
           // $("#proceso").require();
            $("#tema").require();
           // $("#sector").require();
            $("#descripcion").require();
            $("#poe").require();
            $("#tipo").require();
            $("#origen").require();

        });

    });


</script>
<div id="page-content" >
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" enctype="multipart/form-data" class="form-horizontal" >
            <div class="block-title">
                <h4>Registro de Hallazgo</h4>
            </div>
            <div class="block-content">
                <div class="control-group">
                    <label class="control-label" for="general-text">Fecha Deteccion</label>
                    <div class="controls">
                        <input type="text" name="fecha_no_conformidad" value="<?php echo (isset($result->fecha))?$result->fecha:""; ?>" id="fecha_no_conformidad">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Hora Deteccion</label>
                    <div class="controls">
                        <input  onfocus="mascaraHora(this,true,false)" onblur="mascaraHora(this,false,true)" onkeyup="mascaraHora(this,false,false)" name="hora_deteccion" class="span1" id="hora_deteccion" value="<?php echo (isset($result->hora))?$result->hora:""; ?>" />
                    </div>
                </div>
                <div class="control-group" id="proceso_capa" >
                    <label class="control-label" for="general-text">Proceso donde se detecta hallazgo</label>
                    <div class="controls">
                        <input  id="proceso" onchange="borra()"  name="proceso" style="width: 400px;"  class="input-large" value="<?php echo (isset($result->proceso))?$result->proceso:""; ?>" type="text">
                        <input  id="procesoID"  name="procesoID" type="hidden" value="<?php echo (isset($result->id_proceso))?$result->id_proceso:""; ?>">
                    </div>
                </div>
                <div class="control-group" id="sector_capa" >
                    <label class="control-label" for="general-text">Area donde se detecta hallazgo</label>
                    <div class="controls">
                        <input  id="sector" onchange="borra()"  name="sector" style="width: 400px;"  class="input-large" value="<?php echo (isset($result->sector))?$result->sector:""; ?>" type="text">
                        <input  id="sectorID"  name="sectorID" type="hidden" value="<?php echo (isset($result->id_sector))?$result->id_sector:""; ?>">
                    </div>
                </div>
                <div class="control-group" id="sector_capa" >
                    <label class="control-label" for="general-text">Tema</label>
                    <div class="controls">
                        <input  id="tema" name="tema" style="width: 400px;"  class="input-large" value="<?php echo (isset($result->tema))?$result->tema:""; ?>" type="text">
                        <span class="help-block">*Resuma el hallazgo. Ejemplo: Falta de calibracion de Centrifuga CRB-04.</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Descripcion  de Hallazgo</label>
                    <div class="controls">
                        <textarea  id="descripcion"  style="width: 600px; height: 90px;"  name="descripcion"  value=""><?php echo ($result->descripcion)?$result->descripcion:""; ?> </textarea>
                    </div>
                </div>
                <div class="control-group">
                    <input type="file" id="archivo" name="archivo">

                </div>
                <div class="control-group" id="sector_capa" >
                    <label class="control-label" for="general-text">Requisito</label>
                    <div class="controls">
                        <input  id="poe" name="poe" style="width: 400px;"  class="input-large" value="<?php echo (isset($result->poe))?$result->poe:""; ?>" type="text">
                        <input  id="poeID" name="poeID" style="width: 400px;" value="<?php echo (isset($result->id_poe))?$result->id_poe:""; ?>" type="hidden">
                        <span class="help-block">*Nombre del POEs, Clausula ISO 9001.</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Otros Requisitos</label>
                    <div class="controls">
                        <textarea  id="otro_requisito"  style="width: 600px; height: 90px;"  name="otro_requisito"  value=""><?php echo ($result->otro_requisito)?$result->otro_requisito:""; ?> </textarea>
                        <span class="help-block">*Normas, leyes, decretos, resoluciones, otros.</span>
                    </div>
                </div>
                <div class="control-group" id="poe_capa" >
                    <label class="control-label" for="general-text"><strong>Categoria del hallazgo</strong></label>
                    <div class="controls">                    </div>
                </div>
                <div class="control-group" id="poe_capa" >
                    <input type="radio" <?php echo ($result->tipo=='nc')?"checked":""; ?> name="tipo" id="tipo" value="nc">
                    No Conformidad &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="tipo" <?php echo ($result->tipo=='o')?"checked":""; ?> id="tipo" value="o">
                    Observacion &nbsp;&nbsp;&nbsp;
                    <input type="radio"  name="tipo" id="tipo" <?php echo ($result->tipo=='m')?"checked":""; ?>  value="m">
                    Oportunidad de Mejora &nbsp;&nbsp;&nbsp;

                </div>

                <div class="control-group" id="poe_capa" >
                    <label class="control-label" for="general-text"><strong>Origen de hallazgo</strong></label>
                    <div class="controls"></div>
                </div>
                <div class="control-group" id="poe_capa" >
                    <input type="radio" <?php echo ($result->origen=='e')?"checked":""; ?> name="origen" id="origen" value="e">
                    Espontanea del BSTB&nbsp;
                    <input type="radio" name="origen" <?php echo ($result->origen=='ai')?"checked":""; ?> id="origen" value="ai">
                    Auditoria Interna &nbsp;
                    <input type="radio"  name="origen" id="origen" <?php echo ($result->origen=='ae')?"checked":""; ?>  value="ae">
                    Auditoria Externa&nbsp;
                    <input type="radio"  name="origen" id="origen" <?php echo ($result->origen=='p')?"checked":""; ?>  value="p">
                    Proveedor&nbsp;
                    <input type="radio"  name="origen" id="origen" <?php echo ($result->origen=='r')?"checked":""; ?>  value="r">
                    Reclamo de Parte Interesada	&nbsp;
                    <input type="radio"  name="origen" id="origen" <?php echo ($result->origen=='st')?"checked":""; ?>  value="st">
                    STH&nbsp;
                </div>

            </div>

            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_no_conformidad">
                <input id="id_no_conformidad" type="hidden" name="id_no_conformidad" value="<?php echo $_REQUEST['id_no_conformidad'] ?>">
                <button type="reset" onclick="location.href='controlador.php?action=listar_ver_no_conformidad'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                <input  type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar"/>

            </div>
        </form>
    </div>
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script type="text/javascript">

    function enviar_form(){

        $("#form_datos").submit();
    }


    function verifica_estado(value) {
        if (value!="Aprobado") {
            $("#observacion").attr("disabled", false);
        }else{
            $("#observacion").attr("disabled", true);
        }
    }
    function borra() {
        if ($("#proceso").val() == "") {
            $("#procesoID").attr("value","");
            $("#sector_capa").show();
        }
        if ($("#sector").val() == "") {
            $("#sectorID").attr("value","");
            $("#proceso_capa").show();
        }
    }

    newSuggestProcesoNC('proceso', 'procesoID', 'Ar');
    newSuggestSectorNC('sector', 'sectorID', 'S');
    newSuggest('poe', 'poeID', 'Po');

</script>
<?php include_once 'footer.php' ?>
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/Functions.js" type="text/javascript"></script>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="validate/jquery.validity.css">
<script src="validate/jquery.validity.js"></script>
<script>
    $j=jQuery.noConflict();
    $j(function() {

        $j("#fecha_no_conformidad").datepicker({
            dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
            monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
        });
    });


</script>
