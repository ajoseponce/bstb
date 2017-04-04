<body>
<div id="page-content" >
<div class="clearfix">
   
    <button onclick="location.href='controlador.php?action=carga_proveedor'" id="addRow" class="btn btn-success"><i class="icon-plus"></i> Cargar nueva Proveedor</button>
   
</div>
<div class="block block-themed block-last">
    <div class="block-title">
        <h4>Buscar Proveedor</h4>
    </div>
    <div class="block-content">

        <div class="control-group">
            <label class="control-label" for="general-text">Descripcion </label>
            <div class="controls">
                <input value="" id="proveedor"  onchange="buscar_proveedores(this.value)" name="proveedor" class="input-large" type="text">
<!--                <input value="" id="proveedorID"  name="proveedorID" type="hidden">-->
                <!--<span class="help-block">Your username must be unique..</span>-->
            </div>
        </div>
        <form id="form_datos" method="post" class="form-horizontal">
        <div id="box_editar" style="display: none;" class="form-actions">
            <input id="action" type="hidden" name="action" value="edita_proveedor">
            <button type="reset" onclick="location.href='controlador.php?action=lista_proveedores'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
            </button>
            <button onclick="editar_datos()" type="button" class="btn btn-success"><i class="icon-ok"></i> Editar</button>
        </div>
    </form>
        <div id="listado">
    <table class="table">
        <thead>
            <tr style="background: red;" >
                <th style="width: 25%;" >Descripcion</th>
                <th style="width: 25%;" >Direccion</th>
                <th style="width: 25%;" >Mail</th>
                <th style="width: 25%;" >Contacto</th>
                <th style="width: 25%;" >Telefonos</th>
                <th>Estado</th>
                <th style="width: 25%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th style="width: 25%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <!-- <th style="width: 2%;">&nbsp; </th>-->
            </tr>
        </thead>
        
        <tbody>
        <?php
        $k=0;
        if($result_proveedors){
        foreach ($result_proveedors as $r) {
        ?>
            <tr>
                
                <td class="span1 text-left"><?php echo $r->descripcion; ?></td>
                <td class="span1 text-left"><?php echo $r->direccion; ?></td>
                <td class="span1 text-left"><?php echo $r->mail; ?></td>
                <td class="span1 text-left"><?php echo $r->contacto; ?></td>
                <td class="span1 text-left"><?php echo $r->telefonos; ?></td>
                <td class="span1 text-left"><?php echo $r->estado; ?></td>
                <td>
                    <a href="controlador.php?action=edita_proveedor&proveedorID=<?php echo (int)$r->id_proveedor ?>"><img style="cursor: pointer;" src="img/edit.png"/>
                </td>
                <td>
                    <a href="controlador.php?action=eliminar_proveedor&proveedorID=<?php echo (int)$r->id_proveedor ?>"><img style="cursor: pointer;" src="img/delete.png"/>
                </td>
                
                
            </tr>
        <?php  }}else{ ?>
            <tr>
                <td colspan="5" class="span1 text-left">No hay proveedores cargadas</td>
            </tr>
        <?php    
        } ?>
        </tbody>    
    </table>    
    </div>
</div>    
</div>

</body>
</html>
<?php include_once 'footer.php' ?>
