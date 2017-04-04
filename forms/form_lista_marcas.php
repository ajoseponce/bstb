<body>
<div id="page-content" >
<div class="clearfix">
   
    <button onclick="location.href='controlador.php?action=carga_marca'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nueva Marca</button>
   
</div>
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Buscar Marca</h4>
    </div>
    <div class="block-content">
    <form id="form_datos" method="post" class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="general-text">Descripcion </label>
            <div class="controls">
                <input value="" id="marca"  name="marca" class="input-large" type="text">
                <input value="" id="marcaID"  name="marcaID" type="hidden">
                <!--<span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
        <div id="box_editar" style="display: none;" class="form-actions">
            <input id="action" type="hidden" name="action" value="edita_marca">
            <button type="reset" onclick="location.href='controlador.php?action=listar_marcas'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
            </button>
            <button onclick="editar_datos()" type="button" class="btn btn-success"><i class="icon-ok"></i> Editar</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr style="background: red;" >
                <th style="width: 25%;" >Descripcion</th>
                <!--<th>Estado</th>-->
                
                <th style="width: 25%;">&nbsp;</th>
                <!-- <th style="width: 2%;">&nbsp; </th>-->
            </tr>
        </thead>
        
        <tbody>
        <?php
        $k=0;
        if($result_marcas){
        foreach ($result_marcas as $r) {
        ?>
            <tr>
                
                <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                <!--<td class="span1 text-left"><?php echo $r->estado; ?></td>-->
                <td>
                    <a href="controlador.php?action=edita_marca&marcaID=<?php echo (int)$r->id_marca ?>"><img style="cursor: pointer;" src="img/edit.png"/>
                                    <a href="controlador.php?action=eliminar_marca&marcaID=<?php echo (int)$r->id_marca ?>"><img style="cursor: pointer;" src="img/delete.png"/>
                </td>
                
                
            </tr>
        <?php  }}else{ ?>
            <tr>
                <td colspan="5" class="span1 text-left">No hay marcas cargadas</td>
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
newSuggestEditar('marca', 'marcaID', 'M');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>