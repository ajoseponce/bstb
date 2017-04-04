<body>
<div id="page-content" >
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Buscar Equipo</h4>
    </div>
    <div class="block-content">
    <form id="form_datos" method="post" class="form-horizontal" onsubmit="return false;">
        <div class="control-group">
            <label class="control-label" for="general-text">Tipo de mantenimiento </label>
            <div class="controls">
                <input  id="equipo"  name="equipo"  class="input-large" value="<?php echo $_REQUEST['equipo'];  ?>" type="text">
                <input  id="equipoID"  name="equipoID" type="hidden" value="<?php echo $_REQUEST['equipoID'];  ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="general-text">Descripcion o ID del poe </label>
            <div class="controls">
                <select oncha id="tipo_mantenimiento"  name="tipo_mantenimiento">
                    <option>Seleccione tipo de mantenimiento</option>
                    <option>Primer nivel</option>
                    <option>Preventivo</option>
                        
                </select>    
            </div>
        </div>
        
    </form>
    </div>
    <div class="block-content" id="item_mantenimiento">
        
    </div>
    
</div>    
</div>

<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>

<script type="text/javascript">
newSuggestPoe('equipo', 'equipoID', 'EQ');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>
