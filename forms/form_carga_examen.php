<html>
<body>
<div id="page-content" >

<div class="block block-themed block-last">
    <form id="form_datos_examen" name="form_datos_examen" >
    
        
        
       
        <div class="block-title">
        <h4>Buscar Poe</h4>
    </div>
    <div class="block-content">
    
        <div class="control-group">
                
            <label class="control-label" for="general-text">Descripcion o ID del POE </label>
            <div class="controls">
                <input value="" id="poe"  name="poe" class="span5" type="text">
                <input value="" id="poeID"  name="poeID" type="hidden">
                <!--<span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
        
    
    </div>
      
    <div class="block-content" id="examen_poe" style="display: none;" id="pregunta">
    <div class="control-group">
            <label class="control-label" for="general-text">Nombre del Examen </label>
            <div class="controls">
                <input value="" id="nombre_examen"  name="nombre_examen" class="span5" type="text">
                <input value="0" id="cantidad_preguntas"  name="cantidad_preguntas" type="hidden" size="2" maxlength="2">
                
            </div>
        </div>
        <div class="clearfix">
            <button onclick="agregar_pregunta()" type="button" class="btn btn-success"><i class="icon-plus"></i> Agregar Pregunta</button>
        </div>
    
    <div class="control-group" id="preguntas">
        
    </div>
        <div class="clearfix">
        <input id="id_registro" type="hidden" name="id_registro" value=""/>
        <input id="action" type="hidden" name="action" value="guardar_examen"/>
        
        <button onclick="guardar_examen()" type="button" class="btn btn-success"><i class="icon-plus"></i> Guardar Examen</button>
        <a href="controlador.php?action=carga_examen"><button class="btn btn-inverse" type="button" >Cancelar</button></a>
        </div>
    </div>    
     </form>  
</div>    
</div>
       

<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>

<script type="text/javascript">
newSuggestPoeExamen('poe', 'poeID', 'Po');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>
