<body>
<div id="page-content" >

<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Carga relacion area y POES</h4>
    </div>
    <div class="block-content">
    <form id="form_datos" method="post" class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="general-text">Proceso </label>
            <div class="controls">
                <input value="<?php echo (isset($result->area))?$result->area:""; ?>" id="area"   name="area" class="span5" type="text">
                <input value="<?php echo (isset($result->areaID))?$result->areaID:""; ?>" id="areaID"  name="areaID" type="hidden">
                <!--<span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Poez </label>
            <div class="controls">
                <input value="<?php echo (isset($result->poe))?$result->poe:""; ?>" id="poe"  name="poe" class="span5"  type="text">
                <input value="<?php echo (isset($result->poeID))?$result->poeID:""; ?>" id="poeID"  name="poeID" type="hidden">
                <!--<span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
        <div id="box_editar" class="form-actions">
            <input id="action" type="hidden" name="action" value="guardar_relacion_poe_area">
            <input id="id_registro" type="hidden" name="id_registro" value="<?php echo (isset($result->id_registro))?$result->id_registro:""; ?>">
            <button type="reset" onclick="location.href='controlador.php?action=lista_relaciones'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
            </button>
            <button onclick="guardar_relacion()" type="button" class="btn btn-success"><i class="icon-ok"></i> Guardar Relacion</button>
        </div>
    </form>
    </div>
</div>    
</div>
<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
newSuggest('area', 'areaID', 'Ar');
newSuggest('poe', 'poeID', 'Po');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>