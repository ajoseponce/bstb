<?php
/**
 * Created by PhpStorm.
 * User: Jose Ponce
 * Date: 19/07/2016
 * Time: 11:33 AM
 */?>
<body>

<div id="page-content" >
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal"  enctype="multipart/form-data" >
            <div class="block-title">
                <h4>Agregar Notta a Solicitud</h4>
            </div>
            <div class="block-content">
                <div class="control-group">
                    <label class="control-label" for="general-text"><strong>Fecha Deteccion</strong></label>
                    <div class="controls">&nbsp;
                        <label  for="general-text">
                            <?php echo (isset($result->fecha_solicitud))?$result->fecha_solicitud:""; ?>
                        </label>
                    </div>
                </div>

                <div class="control-group" id="sector_capa" >
                    <label class="control-label" for="general-text"><strong>Sector</strong></label>
                    <div class="controls">&nbsp;
                        <label for="general-text">
                            <?php echo (isset($result->sector))?$result->sector:""; ?>
                            <input  id="sectorID"  name="sectorID" type="hidden" value="<?php echo (isset($result->sectorID))?$result->sectorID:""; ?>">
                        </label>
                    </div>
                </div>

                <div class="control-group" id="poe_capa" >
                    <label class="control-label" for="general-text"><strong>Equipo</strong></label>
                    <div class="controls">
                        <label for="general-text">
                            <?php
                            echo $result->armado."-".$result->num_interno." (".$result->descripcion.")";
                            ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text"><strong>Equipo fuera de funcionamiento:</strong></label>
                    <div class="controls">
                        <label for="general-text">
                            <?php echo ($result->estado_equipo=='S')?"Si":"No"; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text"><strong>Requerido Para:</strong></label>
                    <div class="controls">
                        <label for="general-text">
                            <?php echo ($result->requerido_para!='00-00-0000')?$result->requerido_para:""; ?>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="general-text"><strong>Descripcion de la Solicitud:</strong></label>
                    <div class="controls">
                        <label for="general-text">
                            <?php echo ($result->descripcion_falla)?$result->descripcion_falla:""; ?>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <input type="file" id="archivo" name="archivo">
                </div>
                <div class="control-group">
                    <div class="control-group" id="sector_capa" >
                        <label class="control-label" for="general-text"><strong>Observaciones</strong></label>
                        <div class="controls">
                            <textarea  id="observacion" style="width: 650px; height: 215px;"  name="observacion"  value=""></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_nota_solicitud">
                <input id="id_solicitud" type="hidden" name="id_solicitud" value="<?php echo $_REQUEST['id_solicitud'] ?>">
                <button type="reset" onclick="location.href='controlador.php?action=listado_solicitudes'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                <input  type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar"/>

            </div>
        </form>
    </div>
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script type="text/javascript">

    function enviar_form(){
        var error=0
        if($("#observacion").val() ==""){
            error=1
        }
        if (error==1){
            alert('Cargue una nota .Gracias');
            return false;

        }
        $("#form_datos").submit();
    }


</script>
</body>
</html>
<?php include_once 'footer.php' ?>


