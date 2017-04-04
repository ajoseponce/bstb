<body>
<div id="page-content">

    <div class="block block-themed block-last">
        <div class="block-title">
            <h4>Carga Responsable Sector</h4>
        </div>
        <div class="block-content">
            <form id="form_datos" method="post" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label" for="general-text">Sector </label>

                    <div class="controls">
                        <input value="<?php echo (isset($result->sector)) ? $result->sector : ""; ?>" id="sector"
                               name="sector" class="span5" type="text">
                        <input value="<?php echo (isset($result->id_sector)) ? $result->id_sector : ""; ?>" id="sectorID"
                               name="sectorID" type="hidden">
                        <!--<span class="help-block">Your username must be unique..</span>-->
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="general-text">Resposable </label>
                    <div class="controls">
                        <input value="<?php echo (isset($result->persona)) ? $result->persona : ""; ?>" id="persona"
                               name="persona" class="span5" type="text">
                        <input value="<?php echo (isset($result->id_persona)) ? $result->id_persona : ""; ?>"
                               id="personaID" name="personaID" type="hidden">
                    </div>
                </div>
                <div id="box_editar" class="form-actions">
                    <input id="action" type="hidden" name="action" value="guardar_responsable_sector">
                    <input id="id_relacion" type="hidden" name="id_relacion"
                           value="<?php echo (isset($result->id_relacion)) ? $result->id_relacion : ""; ?>">
                    <button type="reset" onclick="location.href='controlador.php?action=lista_responsables'"
                            class="btn btn-danger"><i class="icon-repeat"></i> Volver
                    </button>
                    <button onclick="guardar_relacion()" type="button" class="btn btn-success"><i class="icon-ok"></i>
                        Guardar Relacion
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
    newSuggest('sector', 'sectorID', 'S');
    newSuggest('persona', 'personaID', 'P');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>