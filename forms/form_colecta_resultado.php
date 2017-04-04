<body>

<div id="page-content" >
    <div class="block block-themed block-last">
        <form id="form_datos" method="post" class="form-horizontal" >
            <div class="block-title">
                <h4>Carga de resultados colecta</h4>
            </div>
            <div class="block-content">

                <div class="control-group" >
                    <label class="control-label" for="general-text">Preparacion Insumos </label>
                    <div class="controls">
                        <input  id="preparacion"  onclick="activar('obs_preparacion')" name="preparacion" value="S" type="radio" <?php echo ($result->preparacion=='S')?"checked":""; ?>>SI
                        <input  id="preparacion"  onclick="desactivar('obs_preparacion')" name="preparacion" value="N" type="radio" <?php echo ($result->preparacion=='N')?"checked":""; ?>>NO
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Observacion Preparacion</label>
                    <div class="controls">
                        <textarea  id="obs_preparacion" style="width: 650px; height: 30px;" disabled name="obs_preparacion"  value=""><?php echo ($result->obs_preparacion)?$result->obs_preparacion:""; ?> </textarea>
                    </div>
                </div>
                <div class="control-group" >
                    <label class="control-label" for="general-text">Materiales </label>
                    <div class="controls">
                        <input  id="material"  name="material"  onclick="activar('obs_materiales')" value="S" type="radio" <?php echo ($result->material=='S')?"checked":""; ?>>SI
                        <input  id="material"  name="material"  onclick="desactivar('obs_materiales')" value="N" type="radio" <?php echo ($result->material=='N')?"checked":""; ?>>NO
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Observacion Materiales</label>
                    <div class="controls">
                        <textarea  id="obs_materiales" style="width: 650px; height: 30px;" disabled name="obs_materiales"  value=""><?php echo ($result->obs_materiales)?$result->obs_materiales:""; ?> </textarea>
                    </div>
                </div>
                <div class="control-group" >
                    <label class="control-label" for="general-text">Limpieza Movil </label>
                    <div class="controls">
                        <input  id="limpieza_movil"  name="limpieza_movil" value="L" type="radio" <?php echo ($result->limpieza_movil=='L')?"checked":""; ?>>Limpio
                        <input  id="limpieza_movil"  name="limpieza_movil" value="S" type="radio" <?php echo ($result->limpieza_movil=='S')?"checked":""; ?>>Sucio
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Donantes Asistidos </label>
                    <div class="controls">
                        <input  id="don_asistidos"   name="don_asistidos"  class="input-small" value="<?php echo (isset($result->don_asistidos))?$result->don_asistidos:""; ?>" type="text">

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Donantes Diferidos </label>
                    <div class="controls">
                        <input  id="don_diferidos"   name="don_diferidos"  class="input-small" value="<?php echo (isset($result->don_diferidos))?$result->don_diferidos:""; ?>" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Extracciones </label>
                    <div class="controls">
                        <input  id="extracciones"   name="extracciones"  class="input-small" value="<?php echo (isset($result->extracciones))?$result->extracciones:""; ?>" type="text">
                    </div>
                </div>
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
                <div class="control-group">
                    <label class="control-label" for="general-text">Unidades bajo Volumen </label>
                    <div class="controls">
                        <input  id="unidades_bajo_vol"   name="unidades_bajo_vol"  class="input-small" value="<?php echo (isset($result->unidades_bajo_vol))?$result->unidades_bajo_vol:""; ?>" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Muestras Analiticas</label>
                    <div class="controls">
                        <input  id="muestras_analiticas"   name="muestras_analiticas"  class="input-small" value="<?php echo (isset($result->muestras_analiticas))?$result->muestras_analiticas:""; ?>" type="text">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Efectos Adversos</label>
                    <div class="controls">
                        <input  id="efectos_adversos"   name="efectos_adversos"  class="input-small" value="<?php echo (isset($result->efectos_adversos))?$result->efectos_adversos:""; ?>" type="text">
                    </div>
                </div>
                <div class="control-group" >
                    <label class="control-label" for="general-text">Condicion Lugar</label>
                    <div class="controls">
                        <input  id="condicion_lugar"  name="condicion_lugar" value="A" type="radio" <?php echo ($result->condicion_lugar=='A')?"checked":""; ?>>&nbsp;&nbsp;Apropiado
                        <input  id="condicion_lugar"  name="condicion_lugar" value="I" type="radio" <?php echo ($result->condicion_lugar=='I')?"checked":""; ?>>&nbsp;&nbsp;Inapropiado
                    </div>
                </div>
                <div class="control-group" >
                    <label class="control-label" for="general-text">Ventilacion</label>
                    <div class="controls">
                        <input  id="ventilacion"  name="ventilacion" value="A" type="radio" <?php echo ($result->ventilacion=='A')?"checked":""; ?>>&nbsp;&nbsp;Apropiado
                        <input  id="ventilacion"  name="ventilacion" value="I" type="radio" <?php echo ($result->ventilacion=='I')?"checked":""; ?>>&nbsp;&nbsp;Inadecuado
                    </div>
                </div>
                <div class="control-group" >
                    <label class="control-label" for="general-text">Iluminacion</label>
                    <div class="controls">
                        <input  id="iluminacion"  name="iluminacion" value="A" type="radio" <?php echo ($result->iluminacion=='A')?"checked":""; ?>>&nbsp;&nbsp;Adecuada
                        <input  id="iluminacion"  name="iluminacion" value="E" type="radio" <?php echo ($result->iluminacion=='I')?"checked":""; ?>>&nbsp;&nbsp;Escasa
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Observacion</label>
                    <div class="controls">
                        <textarea  id="observaciones" style="width: 650px; height: 30px;" name="observaciones"  value=""><?php echo ($result->observaciones)?$result->observaciones:""; ?> </textarea>
                    </div>
                </div>

            </div>
            <div class="form-actions">
                <input id="action" type="hidden" name="action" value="guardar_resultado_colecta">
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
