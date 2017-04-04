<body>

<div id="page-content" >
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal" >
            <div class="block-title">
                <h4>Carga de Resultados Hemovigilancia</h4>
            </div>
            <div class="block-content">

                <div class="control-group">
                    <label class="control-label" for="general-text">Reactivos </label>
                    <div class="controls">
                        <input  id="don_reactivos"   name="don_reactivos"  class="input-small" value="<?php echo (isset($result->don_reactivos))?$result->don_reactivos:""; ?>" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Informados </label>
                    <div class="controls">
                        <input  id="don_informados"   name="don_informados"  class="input-small" value="<?php echo (isset($result->don_informados))?$result->don_informados:""; ?>" type="text">
                    </div>
                </div>

            </div>
            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_resultado_hemovigilancia">
                <input id="id_colecta" type="hidden" name="id_colecta" value="<?php echo $_REQUEST['id_colecta'] ?>">
                <button type="reset" onclick="location.href='controlador.php?action=listar_colecta'" class="btn btn-danger"><i class="icon-repeat"></i> Volver</button>
                <input  type="button" onclick="enviar_form()" class="btn btn-success" value="Guardar Resultados"/>

            </div>
        </form>
    </div>
</div>
<script>
    function enviar_form(){
        var error=0

        if (error==1){
            alert('Verifique completar todos los campos .Gracias');
            return false;

        }
        $("#form_datos").submit();
    }
    function activar(value){
        $("#"+value).attr("disabled", "");
    }
    function desactivar(value){
        $("#"+value).attr("disabled", false);
    }
</script>
</body>
</html><?php include_once 'footer.php' ?>
