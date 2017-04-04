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
                    <label class="control-label" for="general-text">Usuario </label>
                    <div class="controls">
                        <input value="" id="usuario"  name="usuario" class="input-large" type="text">
                        <input value="" id="usuarioID"  name="usuarioID" type="hidden">
                        <!--<span class="help-block">Your username must be unique..</span>-->
                    </div>
                </div>
                <div id="box_editar" style="display: none;" class="form-actions">
                    <input id="action" type="hidden" name="action" value="edita_persona">
                    <button type="reset" onclick="location.href='controlador.php?action=listar_usuarios'" class="btn btn-danger"><i class="icon-repeat"></i> Volver
                    </button>
                    <button onclick="editar_datos()" type="button" class="btn btn-success"><i class="icon-ok"></i> Editar</button>
                </div>
            </form>
            <table class="table" >
                <thead>
                <tr style="background: red;" >
                    <th style="width: 25%;" >Apellido Nombre</th>
                    <th>Usuario</th>
                    <th>Clave </th>

                    <th style="width: 25%;">&nbsp;</th>
                    <!-- <th style="width: 2%;">&nbsp; </th>-->
                </tr>
                </thead>

                <tbody>
                <?php
                $k=0;
                if($result_usuarios){
                    foreach ($result_usuarios as $r) {
                        ?>
                        <tr>
                            <td class="span1 text-left"><?php echo $r->persona; ?></td>
                            <td class="span1 text-left"><?php echo $r->usuario; ?></td>
                            <td class="span1 text-left"><?php echo $r->clave; ?></td>
                            <td>
                                <a href="controlador.php?action=edita_usuario&usuarioID=<?php echo (int)$r->id_usuario ?>"><img style="cursor: pointer;" src="img/edit.png"/>
                            </td>


                        </tr>
                    <?php  }}else{ ?>
                    <tr>
                        <td colspan="5" class="span1 text-left">No hay usuarios cargadas</td>
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
s<script type="text/javascript">
    newSuggestEditar('usuario', 'usuarioID', 'U');
</script>
</body>
</html>
<?php include_once 'footer.php' ?>