<html>
<body>
<div id="page-content" >

    <div class="block block-themed block-last">
        <form id="form_datos_unidad" name="form_datos_unidad" onsubmit="return false">




            <div class="block-title">
                <h4>Carga de Unidades a Informar</h4>
            </div>
            <div class="block-content">

                <div class="control-group">

                    <label class="control-label" for="general-text">Nro de Unidad </label>
                    <div class="controls">
                        <input value="" onchange="ver_datos_unidad(this.value)" id="nro_unidad"  name="nro_unidad" class="span5" type="text">
                    </div>
                </div>
               <div class="control-group" id="datos_unidad" style="display: none;">
                <div class="control-group">
                    <label class="control-label" for="general-text"><strong>Nro de Donacion</strong> </label>
                    <div class="controls" id="nro_donacion">
                    </div>
                </div>
                   <div class="control-group">
                       <label class="control-label" for="general-text"><strong>Paciente</strong> </label>
                       <div class="controls" id="paciente">
                       </div>
                   </div>
                <?php if($determinaciones){
                    foreach($determinaciones as $d){ ?>
                    <div class="control-group">
                        <div class="controls" >
                            <?php echo $d->descripcion; ?>
                            <input type="checkbox" value="S">
                        </div>
                    </div>
                <?php }} ?>
                   <div class="form-actions">
                       <input id="action" type="hidden" name="action" value="guardar_informe">
                       <input id="id_informe" type="hidden" name="id_informe" value="<?php echo $_REQUEST['id_informe'] ?>">
                       <button type="reset" onclick="location.href='controlador.php?action=listar_reactivos'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                       <input  type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar"/>

                   </div>
               </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script type="text/javascript">

    function enviar_form(){
        $("#form_datos").submit();
    }

</script>
<?php include_once 'footer.php' ?>