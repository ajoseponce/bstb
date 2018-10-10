<body>
<div id="page-content" >
<div class="clearfix">
       <button onclick="location.href='controlador.php?action=carga_persona'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nueva Persona</button>
</div>
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Buscar Personas</h4>
    </div>
    <div class="block-content" style="overflow: auto;">
    <form id="form_datos" method="post" class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="general-text">Nombre, Apellido o DNI </label>
            <div class="controls">
                <input value="" id="persona"  name="persona" class="input-large" type="text">
                <input value="" id="personaID"  name="personaID" type="hidden">
                <!--<span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
        <div id="box_editar" style="display: none;" class="form-actions">
            <input id="action" type="hidden" name="action" value="edita_persona">
            <button type="reset" onclick="location.href='controlador.php?action=listar_personas'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
            </button>
            <button onclick="editar_datos()" type="button" class="btn btn-success"><i class="icon-ok"></i> Editar</button>
        </div>
    </form>
    <table class="table" >
        <thead>
            <tr style="background: red;" >
                <th style="width: 25%;" >Apellido Nombre</th>
                <th>Fecha Nacimiento</th>
                <th>DNI </th>
                <th>Rol </th>
                <th style="width: 25%;">&nbsp;</th>
                <!-- <th style="width: 2%;">&nbsp; </th>-->
            </tr>
        </thead>
        
        <tbody>
        <?php
        $k=0;
        if($result_personas){
        foreach ($result_personas as $r) {
        ?>
            <tr>
                
                <td class="span1 text-left"><?php echo $r->apellido." ".$r->nombre; ?></td>
                <td class="span1 text-left"><?php echo $r->fecha_nacimiento; ?></td>
                <td class="span1 text-left"><?php echo $r->dni; ?></td>
                <td class="span1 text-left"><?php echo $r->rol; ?></td>
                <td>
                    <a href="controlador.php?action=edita_persona&personaID=<?php echo (int)$r->id_persona ?>"><img style="cursor: pointer;" src="img/edit.png"/>
                        <a href="controlador.php?action=baja_persona&personaID=<?php echo (int)$r->id_persona ?>"><img style="cursor: pointer;" src="img/delete.png"/>
                </td>
                
                
            </tr>
        <?php  }}else{ ?>
            <tr>
                <td colspan="5" class="span1 text-left">No hay personas cargadas</td>
            </tr>
        <?php    
        } ?>
        </tbody>    
    </table>    
    </div>
</div>    
</div>

<script src="js/AutoSuggest.js" type="text/javascript"></script>
<script src="js/ClearDefaultText.js" type="text/javascript"></script>
<script type="text/javascript">
newSuggestEditar('persona', 'personaID', 'P');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>